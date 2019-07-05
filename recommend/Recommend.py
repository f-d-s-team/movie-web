#coding:utf-8
from CB import *
from UserCF import *
import mysql.connector
from CreateDict import *
import Find_K_SimilarItems as fksi
from WriteToDB import *
import sys
import codecs
import urllib.request
sys.stdout =codecs.getwriter("utf-8")(sys.stdout.detach())
# 两种推荐算法后融合，也就是将两种推荐算法对某个用户分别产生的两个推荐节目集按不同比例混合，得出最后的对该用户的推荐结果
# 对于每个用户推荐topN个节目,在两种推荐算法产生的推荐集中分别选取比例为w1和w2的推荐结果,CB占w1, userCF占w2
# w1 + w2 = 1 且 w1 * topN + w2 * topN = topN
topN = 16
w1 = 0.5
w2 = 0.5
# 从CB的推荐集中选出前topW1项
topW1 = int(w1 * topN)
# 从userCF的推荐集中选出前topW2项
topW2 = topN-topW1
film_recommend_num = 128
neighborNum = 4

label_names = ['juqing', 'xiju', 'dongzuo', 'aiqing', 'kehuan', 'donghua', 'xuanyi', 'jingsong','kongbu','jilupian','jiating','fanzui','qihuan','maoxian']


ufs_tbname = 'Usr_Score'
film_tbname = 'Movie_Data'
user_tbname = 'USR'
output_tbname = 'Recommend'
output_colnames =('ID','title','Score')
DBname = 'FDS'
DBuser = 'root'
DBpwd = 'Zw@445400'


def outputToDB(conn, output_tbname, outputdata, output_colnames):
    users = set()
    for row in outputdata:
        users.add(row[0])
    for user in list(users):
        sqldel = "DELETE FROM "+'`'+output_tbname+'`'+ " where " + output_colnames[0] + '=' + "'%s'" % user
        conn.cursor().execute(sqldel)
    writeToDB(conn, output_tbname, outputdata, output_colnames)


# 输出推荐给该用户的节目列表
# max_num:最多输出的推荐节目数
def printRecommendItems(recommend_items_sorted, max_num):
    count = 0
    for item, degree in recommend_items_sorted:
        print("节目名：%s， 推荐指数：%f" % (item, degree))
        count += 1
        if count == max_num:
            break


def recommendByUser(user, users_profile, items_to_be_recommended_profiles, items_user_saw, users_dict, items_dict):
    recommend_items = []
    # CB
    # recommend_items1 =  [[节目名, 该节目与该用户user画像的相似度], ...]
    recommend_items1 = contentBased(users_profile, items_to_be_recommended_profiles, label_names, items_user_saw)
    if len(recommend_items1) > topW1:
        recommend_items1 = recommend_items1[:topW1]
    # userCF
    # recommend_item2 = [[节目名, 该用户user对该节目的感兴趣程度],...]
    all_items_names_to_be_recommend = [x for x in items_to_be_recommended_profiles.keys()]
    recommend_items2 = userCF(user, users_dict, items_dict, neighborNum, all_items_names_to_be_recommend)
    if len(recommend_items2) > topW2:
        recommend_items2 = recommend_items2[:topW2]
    recommend_items = recommend_items2 + recommend_items1
    # 将推荐结果按推荐指数降序排序
    # recommend_items.sort(key=lambda item: item[1], reverse=True)
    return recommend_items


def UFSDedup(ufsdata):
    ufsdict = defaultdict(lambda:0)
    for (usr,film,score) in ufsdata:
        ufsdict[(usr,film)]=score
    res = [key +(item,) for key,item in ufsdict.items()]
    return res


def fetchDataFromDB(conn):
    cursor = conn.cursor()
    cursor.execute('select * from %s' % ufs_tbname)
    ufs = cursor.fetchall()
    ufs = [(x[0],x[1],x[2]/10)for x in ufs]
    filmsql = 'select ' + 'title,'
    for l in label_names[:-1]:
        filmsql+= l+','
    filmsql +=label_names[-1]
    filmsql += ' from ' + film_tbname
    cursor.execute(filmsql)
    film = cursor.fetchall()
    cursor.execute('select * from %s' % user_tbname)
    user = cursor.fetchall()
    return user, film, ufs


def calCosDistanceDesc(itemref,calcItems,labels):
    res = []
    for item in calcItems.items():
            res.append([item[0], calCosDistance(itemref, item[1], labels)])
    res.sort(key=lambda item: item[1], reverse=True)
    return res


def similar_films(film_name, film_profile, find_profiles, users_dict, films_dict):
    names = fksi.find_K_similar_items(film_name, films_dict, users_dict, find_profiles.keys(), film_recommend_num)
    num = film_recommend_num - len(names)
    if num > 0:
        namesCos = calCosDistanceDesc(film_profile,find_profiles,label_names)
        names +=namesCos[:num]
    names = [x[0] for x in names]
    res = {key:value for key,value in find_profiles.items() if key in names}
    return res


if __name__ == '__main__':
    conn = mysql.connector.connect(user=DBuser, password=DBpwd, database=DBname, use_unicode=True)
    (user, film, ufs) = fetchDataFromDB(conn)
    ufs = UFSDedup(ufs)
    items_profiles = createItemsProfiles(film,label_names)
    # users_dict = {用户一:[['节目一', 3.2], ['节目四', 0.2], ['节目八', 6.5]], 用户二: ... }
    users_dict = createUsersDict(ufs)
    # items_dict = {节目一: [用户一, 用户三], 节目二: [...], ... }
    items_dict = createItemsDict(ufs)
    # 为用户看过的节目建立节目画像
    # 建立用户画像users_profiles和用户看过的节目集items_users_saw_scores
    (users_profiles, items_users_saw_scores) = createUsersProfiles(ufs, items_profiles, label_names)
    # 为备选推荐节目集建立节目画像
    print(sys.getfilesystemencoding())
    print("argv",sys.argv)
    user = sys.argv[1]
    print("user",user)
    items_to_be_recommended_profiles = None
    if len(sys.argv)>2:
        #curfilm = sys.argv[2].encode('ascii',errors='surrogateescape').decode('utf-8',errors='surrogateescape')       
        curfilm =sys.argv[2]
        print(curfilm)
        #sys.stdout =codecs.getwriter("utf-8")(sys.stdout.detach())
        #print(curfilm)
        items_to_be_recommended_profiles = similar_films(curfilm, items_profiles[curfilm], items_profiles, users_dict, items_dict)
    else:
        items_to_be_recommended_profiles = items_profiles
    outputdata = []
    items_user_saw = [x[0] for x in items_users_saw_scores[user]]
    recommend_items = recommendByUser(user,users_profiles[user], items_to_be_recommended_profiles, items_user_saw, users_dict, items_dict)
    outputdata += [(user,)+tuple(x) for x in recommend_items]
    print(u"对于用户 的推荐节目如下")
    printRecommendItems(recommend_items, topN)
    print()
    outputToDB(conn,output_tbname,outputdata,output_colnames)
    conn.close()

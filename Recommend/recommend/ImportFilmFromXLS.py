
from collections import defaultdict
from WriteToDB import *
import pandas as pd


all_tags = ['juqing', 'xiju', 'dongzuo', 'aiqing', 'kehuan', 'donghua', 'xuanyi', 'jingsong','kongbu','jilupian','jiating','fanzui','qihuan','maoxian']
DB_cols = ('name','1','2','3','4','5','6','7','8','9','10','11','12','13','14')




#sheetname is tag
# name  score url1 url2
#
#
#return data:[(name,score,url1,url2,tag)]
def readxls(path):
    filmdata = []
    dfdict = pd.read_excel(path, sheet_name=None)
    for key,df in dfdict.items():
        for index,row in df.iterrows():
            film = (str(row[0]), row[1], str(row[2]), str(row[3]), key)
            filmdata.append(film)
    return filmdata


# url1 score name  url2 tag
#
#
#return data:[(name,score,url1,url2,tag)]
def readxlswithtag(path):
    filmdata = []
    dfdict = pd.read_excel(path, sheet_name=None)
    for key,df in dfdict.items():
        for index,row in df.iterrows():
            film = (str(row[2]), row[1], str(row[0]), str(row[3]), str(row[4]))
            filmdata.append(film)
    return filmdata

# data:[(name,score,url1,url2,tag)]
#return dict:{film1:{ 'score':0, 'url2s':{url21,url22}, 'url1s':{url11,url12}, 'tags':{tag1,tag2}},film2:.....}
def merge(data: list):
    dict = defaultdict(lambda:{ 'score':0, 'url2s':set(), 'url1s':set(), 'tags':set()})
    for film in data:
        dict[film[0]]['tags'].add(film[-1])
        dict[film[0]]['url1s'].add(str(film[2]))
        dict[film[0]]['url2s'].add(str(film[3]))
        dict[film[0]]['score']= float(film[1])
    return dict


# tags: set(tag1,tag2.....)
#all_tags:tuple(tag1,tag2......)
def create01vector(all_tags,tags):
    vec =[]
    for tag in all_tags:
        if tag in tags:
            vec.append(1)
        else:
            vec.append(0)
    return tuple(vec)


#filmdata:{ 'score':0, 'url2s':{url21,url22}, 'url1s':{url11,url12}, 'tags':{tag1,tag2}}
def formattoDB(filmname,filmdata):
    vec = create01vector(all_tags,filmdata['tags'])
    return (filmname,) + vec


#filmdict:{film1:{ 'score':0, 'url2s':{url21,url22}, 'url1s':{url11,url12}, 'tags':{tag1,tag2}},film2:.....}
def toexcel(path,filmdict):
    data_to_be_written =[]
    for film, filmdata in filmdict.items():
        url1s = list(filmdata['url1s'])
        url2s = list(filmdata['url2s'])
        url1 = ''
        url2 = ''
        if len(url1s)>0 :
            url1 = url1s[0]
        if len(url2s)>0 :
            url2 = url2s[0]
        tobe_write = [film,url1, filmdata['score'],url2 ]+list(create01vector(all_tags,filmdata['tags']))
        data_to_be_written.append(tobe_write)
    df = pd.DataFrame(data_to_be_written, columns=['filmname']+['douban_url']+['score']+['url']+all_tags)
    df.to_excel(path)


if __name__ == '__main__':
    data = readxlswithtag('data.xlsx')
    filmdict = merge(data)
    toexcel('outdata.xls',filmdict)

#    conn =  mysql.connector.connect(user='root', password='123456', database='fdstess', use_unicode=True)
#    films =[]
#    for film, filmdata in filmdict.items():
#        films.append(formattoDB(film,filmdata))
#    toDB(conn, "film", films, DB_cols)

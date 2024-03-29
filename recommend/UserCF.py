# 代码说明：
# 基于用户的协同过滤算法的具体实现
from collections import defaultdict
from CreateDict import *

import math


# 借助pearson相关系数进行修正后的余弦相似度计算公式，计算两个用户之间的相似度
# 记  sim(user1, user2) = sigma_xy /sqrt(sigma_x * sigma_y)
# user1和user2都表示为[[节目名称,隐性评分], [节目名称,隐性评分]],如user1 = [['节目一', 3.2], ['节目四', 0.2], ['节目八', 6.5], ...]
def calCosDistByPearson(user1, user2):
    x = 0.0
    y = 0.0

    sigma_xy = 0.0
    sigma_x = 0.0
    sigma_y = 0.0

    for item in user1:
        x += item[1]

    # user1对其看过的所有节目的平均评分
    average_x = x / len(user1)

    for item in user2:
        y += item[1]

    # user2对其看过的所有节目的平均评分
    average_y = y / len(user2)

    for item1 in user1:
        for item2 in user2:
            if item1[0] == item2[0]:  # 对user1和user2都共同看过的节目才考虑进去
                sigma_xy += (item1[1] - average_x) * (item2[1] - average_y)
                sigma_x += (item1[1] - average_x) * (item1[1] - average_x)
                sigma_y += (item2[1] - average_y) * (item2[1] - average_y)

    if sigma_x == 0.0 or sigma_y == 0.0:  # 若分母为0，相似度为0
        return 0

    return sigma_xy/math.sqrt(sigma_x * sigma_y)


# 找出与用户user_name相关的所有用户（即邻居）并依照相似度排序
# neighbors_distance = [[用户名, 相似度大小], [...], ...] = [['用户四', 0.78],[...], ...]
def findSimilarUsers(users_dict, items_dict, user_name):

    neighbors = []   # neighbors表示与该用户看过相同节目的所有用户

    for items in users_dict[user_name]:
        for neighbor in items_dict[items[0]]:
            if neighbor[0] != user_name and neighbor[0] not in neighbors:
                neighbors.append(neighbor[0])

    # 计算该用户与其所有邻居的相似度并降序排序
    neighbors_distance = []
    for neighbor in neighbors:
        distance = calCosDistByPearson(users_dict[user_name], users_dict[neighbor])
        neighbors_distance.append([neighbor, distance])

    neighbors_distance.sort(key=lambda item: item[1], reverse=True)

    return neighbors_distance


# 基于用户的协同过滤算法
# K为邻居个数，是一个重要参数，参数调优时使用
def userCF(user_name, users_dict, items_dict, K, all_items_names_to_be_recommend):

    # recommend_items = {节目名：某个看过该节目的该用户user_name的邻居与该用户的相似度, ...}
    recommend_items = {}
    # 将上面的recommend_items转换成列表形式并排序为recommend_items_sorted = [[节目一, 该用户对节目一的感兴趣程度],[...], ...]
    recommend_items_sorted_and_Normed = []

    # 用户user_name看过的节目
    items_user_saw = []
    for item in users_dict[user_name]:
        items_user_saw.append(item[0])

    # 找出与该用户相似度最大的K个用户(邻居)
    similar_users = findSimilarUsers(users_dict, items_dict, user_name)
    if len(similar_users) < K:
        k_similar_user = similar_users
    else:
        k_similar_user = similar_users[:K]
    # 得出对该用户的推荐节目集
    for user in k_similar_user:
        #相似度小于0.25的用户不计入
        if user[1]<0.25:
            break
        for item in users_dict[user[0]]:
            # 该用户user_name没有看过的节目才添加进来，才可以推荐给该用户
            if item[0] not in items_user_saw:
                # 而且该节目必须是在备选推荐节目集中
                if item[0] in all_items_names_to_be_recommend:
                    if item[0] not in recommend_items:
                        # recommend_items是一个字典。第一次迭代中，表示将第一个邻居用户与该用户的相似度加到节目名上，后续迭代如果有其他邻居用户也看过该节目，
                        # 也将其与该用户的相似度加到节目名上，迭代的结果就是该用户对该节目的感兴趣程度
                        recommend_items[item[0]] = [user[1] * item[1],user[1]]

                    else:
                        # 如果某个节目有k个邻居用户看过，则将这k个邻居用户与该用户的相似度相加，得到该用户对某个节目的感兴趣程度
                        recommend_items[item[0]][0] += user[1] * item[1]
                        recommend_items[item[0]][1] += user[1]

    for key in recommend_items:
        recommend_items_sorted_and_Normed.append([key, recommend_items[key][0]/recommend_items[key][1]])

    # 对推荐节目集按用户感兴趣程度降序排序
    recommend_items_sorted_and_Normed.sort(key=lambda item: item[1], reverse=True)

    return recommend_items_sorted_and_Normed


# 输出推荐给该用户的节目列表
# max_num:最多输出的推荐节目数
def printRecommendItems(recommend_items_sorted, max_num):
    count = 0
    for item, degree in recommend_items_sorted:
        print("节目名：%s， 推荐指数：%f" % (item, degree))
        count += 1
        if count == max_num:
            break

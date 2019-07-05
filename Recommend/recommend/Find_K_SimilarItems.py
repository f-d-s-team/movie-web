# 代码说明：
# 基于用户的协同过滤算法的具体实现
from CreateDict import *
import math


# 借助pearson相关系数进行修正后的余弦相似度计算公式，计算两个用户之间的相似度
# 记  sim(item1, item2) = sigma_xy /sqrt(sigma_x * sigma_y)
# item1和item2都表示为[[节目名称,隐性评分], [节目名称,隐性评分]],如item1 = [['节目一', 3.2], ['节目四', 0.2], ['节目八', 6.5], ...]
def calCosDistByPearson(item1, item2):
    x = 0.0
    y = 0.0

    sigma_xy = 0.0
    sigma_x = 0.0
    sigma_y = 0.0

    for user in item1:
        x += user[1]

    # item1对其看过的所有节目的平均评分
    average_x = x / len(item1)

    for user in item2:
        y += user[1]

    # item2对其看过的所有节目的平均评分
    average_y = y / len(item2)

    for user1 in item1:
        for user2 in item2:
            if user1[0] == user2[0]:  # 对item1和item2都共同看过的节目才考虑进去
                sigma_xy += (user1[1] - average_x) * (user2[1] - average_y)
                sigma_x += (user1[1] - average_x) * (user1[1] - average_x)
                sigma_y += (user2[1] - average_y) * (user2[1] - average_y)

    if sigma_x == 0.0 or sigma_y == 0.0:  # 若分母为0，相似度为0
        return 0

    return sigma_xy/math.sqrt(sigma_x * sigma_y)




# 找出与用户item_name相关的所有用户（即邻居）并依照相似度排序
# neighbors_distance = [[用户名, 相似度大小], [...], ...] = [['用户四', 0.78],[...], ...]
def findSimilaritems(items_dict, users_dict, item_name,search_item_names):

    neighbors = []   # neighbors表示被看过该电影的人所看过的全部电影

    for user in items_dict[item_name]:
        for neighbor in users_dict[user[0]]:
            if neighbor[0] != item_name and neighbor[0] not in neighbors and neighbor[0] in search_item_names:
                neighbors.append(neighbor[0])

    # 计算该物品与其所有邻居的相似度并降序排序
    neighbors_distance = []
    for neighbor in neighbors:
        distance = calCosDistByPearson(items_dict[item_name], items_dict[neighbor])
        neighbors_distance.append([neighbor, distance])

    neighbors_distance.sort(key=lambda user: user[1], reverse=True)

    return neighbors_distance


# 基于物品的协同过滤算法
# K为邻居个数，是一个重要参数，参数调优时使用
def find_K_similar_items(item_name, items_dict, users_dict,search_item_names , K):

    # 找出与该用户相似度最大的K个用户(邻居)
    similar_items = findSimilaritems(items_dict, users_dict, item_name,search_item_names)
    if len(similar_items) < K:
        k_similar_item = similar_items
    else:
        k_similar_item = similar_items[:K]
    return k_similar_item

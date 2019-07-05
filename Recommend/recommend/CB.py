# 代码说明：
# 基于内容的推荐算法的具体实现
from collections import defaultdict

import math


# 创建节目画像
# 参数说明：
# items : name label1val label2val ...
# items_profiles = {item1:{'label1':1, 'label2': 0, 'label3': 0, ...}, item2:{...}...}
def createItemsProfiles(items, labels_names):

    items_profiles = defaultdict(lambda: defaultdict(lambda: 0))

    for item in items:
        for j in range(len(labels_names)):
            items_profiles[item[0]][labels_names[j]] = item[j+1]

    return items_profiles


# 创建用户画像
# 参数说明：
# usr_film_scores : usrid filmname score
# users_profiles = {user1:{'label1':1.1, 'label2': 0.5, 'label3': 0.0, ...}, user2:{...}...}
# items_profiles = {item1:{'label1':1, 'label2': 0, 'label3': 0, ...}, item2:{...}...}
def createUsersProfiles(usr_film_scores, items_profiles, labels_names):
    users_profiles = defaultdict(lambda: defaultdict(lambda : 0))
    # 计算每个用户对所看过的所有节目的平均隐性评分
    # users_average_scores = {user1:1.2, user2:2.2, user3:4.3,...}
    users_average_scores = defaultdict(lambda : 0)
    # 统计每个用户所看过的节目及评分
    # items_users_saw_scores = {user1:[[item1, 1.1], [item2, 4.1]], user2:...}
    items_users_saw_scores = defaultdict(lambda : [])
    items_users_saw_scores_sum = defaultdict(lambda : 0)
    items_users_saw_count = defaultdict(lambda : 0)
    for usr_film_score in usr_film_scores:
        # 用户对该节目隐性评分为正，表示真正看过该节目
        if usr_film_score[2] > 0:
            items_users_saw_scores[usr_film_score[0]].append([usr_film_score[1], usr_film_score[2]])
            items_users_saw_count[usr_film_score[0]] += 1
            items_users_saw_scores_sum[usr_film_score[0]] += usr_film_score[2]

    for user in items_users_saw_scores.keys():
        if items_users_saw_count[user] == 0:
            users_average_scores[user] = 0
        else:
            users_average_scores[user] = items_users_saw_scores_sum[user] / items_users_saw_count[user]

    for user in items_users_saw_scores.keys():
        for label in labels_names:
            count = 0
            score = 0.0
            for item in items_users_saw_scores[user]:
                # 参数：
                # 用户user1对于类型label1的隐性评分: user1_score_to_label1
                # 用户user1对于其看过的含有类型label1的节目item i 的评分: score_to_item i
                # 用户user1对其所看过的所有节目的平均评分: user1_average_score
                # 用户user1看过的节目总数: items_count
                # 公式： user1_score_to_label1 = Sigma(score_to_item i - user1_average_score)/items_count
                # 该节目含有特定标签labels_names[j]
                if items_profiles[item[0]][label] > 0:
                    score += (item[1] - users_average_scores[user])
                    count += 1
            # 如果求出的值太小，直接置0
            if abs(score) < 1e-6:
                score = 0.0
            if count == 0:
                result = 0.0
            else:
                result = score / count
            users_profiles[user][label] = result
    return users_profiles, items_users_saw_scores


# 计算用户画像向量与节目画像向量的距离（相似度）
# 向量相似度计算公式：
# cos(user, item) = sigma_ui/sqrt(sigma_u * sigma_i)

# 参数说明：
# A: 某A的画像 user = {'label1':1.1, 'label2': 0.5, 'label3': 0.0, ...}
# B: 某B的画像 item = {'label1':1, 'label2': 0, 'label3': 0, ...}
# labels_names: 所有类型名
def calCosDistance(A, B, labels_names):

    sigma_ui = 0.0
    sigma_u = 0.0
    sigma_i = 0.0

    for label in labels_names:
        sigma_ui += A[label] * B[label]
        sigma_u += (A[label] * A[label])
        sigma_i += (B[label] * B[label])

    if sigma_u == 0.0 or sigma_i == 0.0:  # 若分母为0，相似度为0
        return 0

    return sigma_ui/math.sqrt(sigma_u * sigma_i)


# 基于内容的推荐算法：
# 借助特定某个用户user的画像user_profile和备选推荐节目集的画像items_profiles，通过计算向量之间的相似度得出推荐节目集

# 参数说明：
# user_profile: 某一用户user的画像 user_profile = {'label1':1.1, 'label2': 0.5, 'label3': 0.0, ...}
# items_profiles: 备选推荐节目集的节目画像: items_profiles = {item1:{'label1':1, 'label2': 0, 'label3': 0}, item2:{...}...}
# items_names: 备选推荐节目集中的所有节目名
# labels_names: 所有类型名
# items_user_saw: 用户user看过的节目

def contentBased(user_profile, items_profiles, labels_names, items_user_saw):

    # 对于用户user的推荐节目集为 recommend_items = [[节目名, 该节目画像与该用户画像的相似度], ...]
    recommend_items = []
    for item in items_profiles.items():
        # 从备选推荐节目集中的选择用户user没有看过的节目
        if item[0] not in items_user_saw:
            recommend_items.append([item[0], calCosDistance(user_profile, item[1], labels_names)])
    # 将推荐节目集按相似度降序排列
    recommend_items.sort(key=lambda item: item[1], reverse=True)
    return recommend_items


# 输出推荐给该用户的节目列表
# max_num:最多输出的推荐节目数
def printRecommendedItems(recommend_items_sorted, max_num):
    count = 0
    for item, degree in recommend_items_sorted:
        print("节目名：%s， 推荐指数：%f" % (item, degree))
        count += 1
        if count == max_num:
            break

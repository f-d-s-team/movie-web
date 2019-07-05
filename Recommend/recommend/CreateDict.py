# 创建所有节目被哪些用户观看的字典，也就是创建“从节目到用户”的倒排表users_and_items
# usr_film_scores : usrid filmname score
# users_to_items = {节目一: [用户一, 0.78,用户三,0.45], 节目二: ... }
from collections import defaultdict


def createItemsDict(usr_film_scores):

    items_to_users = defaultdict(lambda : [])

    for usr_film_score in usr_film_scores:
        if usr_film_score[2] > 0:
            items_to_users[usr_film_score[1]].append([usr_film_score[0], usr_film_score[2]])

    return items_to_users
# 创建所有用户的观看信息（包含隐性评分信息）,“从用户到节目”
# usr_film_scores : usrid filmname score
# 格式例子：items_to_users = {用户一:[['节目一', 3.2], ['节目四', 0.2], ['节目八', 6.5]], 用户二: ... }

def createUsersDict(usr_film_scores):

    users_to_items = defaultdict(lambda : [])

    for usr_film_score in usr_film_scores:
        if usr_film_score[2] > 0:
            users_to_items[usr_film_score[0]].append([usr_film_score[1], usr_film_score[2]])

    return users_to_items

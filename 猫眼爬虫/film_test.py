# import requests
# import re
# #豆瓣电影分类，剧情，爱情，，，
import requests
import json
import pandas
import xlrd
import xlwt
from openpyxl import load_workbook
import openpyxl
import os
import time
#动态网页的爬取，利用json分析数据
#爬取豆瓣电影分类排行榜 - 动作片top10%的电影名、评分和豆瓣链接
#利用foamat(***)函数传参start={***}
url1='https://movie.douban.com/j/chart/top_list?type=11&interval_id=100%3A90&action=&start={}&limit=20'#剧情
url2='https://movie.douban.com/j/chart/top_list?type=24&interval_id=100%3A90&action=&start={}&limit=20'#喜剧
url3='https://movie.douban.com/j/chart/top_list?type=5&interval_id=100%3A90&action=&start={}&limit=20'#动作
url4='https://movie.douban.com/j/chart/top_list?type=13&interval_id=100%3A90&action=&start={}&limit=20'#爱情
url5='https://movie.douban.com/j/chart/top_list?type=17&interval_id=100%3A90&action=&start={}&limit=20'#科幻
url6='https://movie.douban.com/j/chart/top_list?type=25&interval_id=100%3A90&action=&start={}&limit=20'#动画
url7='https://movie.douban.com/j/chart/top_list?type=10&interval_id=100%3A90&action=&start={}&limit=20'#悬疑
url8='https://movie.douban.com/j/chart/top_list?type=19&interval_id=100%3A90&action=&start={}&limit=20'#惊悚
url9='https://movie.douban.com/j/chart/top_list?type=20&interval_id=100%3A90&action=&start={}&limit=20'#恐怖
url10='https://movie.douban.com/j/chart/top_list?type=1&interval_id=100%3A90&action=&start={}&limit=20'#纪录片
url11='https://movie.douban.com/j/chart/top_list?type=28&interval_id=100%3A90&action=&start={}&limit=20'#家庭
url12='https://movie.douban.com/j/chart/top_list?type=3&interval_id=100%3A90&action=&start={}&limit=20'#犯罪
url13='https://movie.douban.com/j/chart/top_list?type=16&interval_id=100%3A90&action=&start={}&limit=20'#奇幻
url14='https://movie.douban.com/j/chart/top_list?type=15&interval_id=100%3A90&action=&start={}&limit=20'#冒险
url_total=[url1,url2,url3,url4,url5,url6,url7,url8,url9,url10,url11,url12,url13,url14]
filminfolist=[]#存放结果
# 20 40...300,间隔20，每隔20条取一下数据
for k in range(0,14,1):
    for i in range(0, 700, 20):#取top10的电影
        url=url_total[k]
        aimurl = url.format(i)  # 返回一个url
        res = requests.get(aimurl)
        jd = json.loads(res.text)  # 改成json格式方便读取数据
        # print(jd)
        # 在JSON中，有两种结构：对象和数组。
        for j in jd:
            filminfo = {}  # 以字典存储单条数据
            filminfo['rank']=j['rank']
            filminfo['title'] = j['title']  # 获取电影名字
            filminfo['score'] = j['score']
            filminfo['url'] = j['cover_url']#海报
            filminfo['douban_url'] = j['url']#豆瓣链接
            filminfolist.append(filminfo)
    #print(len(filminfolist))
    for filminfo in filminfolist:
        print(filminfo)
    # 将字典写入excel
    if k==0:
        df = pandas.DataFrame(filminfolist)
        filepath='d:\\test\\douban_juqing2.xlsx'
        sheetname='剧情'
        df.to_excel(filepath, sheetname,index=False)  # 大写的D会报错
        excel_file = pandas.read_excel(filepath)
        excel_file.to_csv('juqing2txt.txt', sep='\t', index=False)
    if k==1:
        df = pandas.DataFrame(filminfolist)
        filepath = 'd:\\test\\douban_xiju1.xlsx'
        sheetname = '喜剧'
        df.to_excel(filepath, sheetname,index=False)  # 大写的D会报错
        excel_file = pandas.read_excel(filepath)
        excel_file.to_csv('xiju2txt.txt', sep='\t', index=False)
    if k == 2:
        df = pandas.DataFrame(filminfolist)
        filepath = 'd:\\test\\douban_dongzuo1.xlsx'
        sheetname = '动作'
        df.to_excel(filepath, sheetname,index=False)  # 大写的D会报错
        excel_file = pandas.read_excel(filepath)
        excel_file.to_csv('dongzuo2txt.txt', sep='\t', index=False)
    if k == 3:
        df = pandas.DataFrame(filminfolist)
        filepath = 'd:\\test\\douban_aiqing1.xlsx'
        sheetname = '爱情'
        df.to_excel(filepath, sheetname,index=False)  # 大写的D会报错
        excel_file = pandas.read_excel(filepath)
        excel_file.to_csv('aiqing2txt.txt', sep='\t', index=False)
    if k == 4:
        df = pandas.DataFrame(filminfolist)
        filepath = 'd:\\test\\douban_kehuan1.xlsx'
        sheetname = '科幻'
        df.to_excel(filepath, sheetname,index=False)  # 大写的D会报错
        excel_file = pandas.read_excel(filepath)
        excel_file.to_csv('kehuan2txt.txt', sep='\t', index=False)
    if k == 5:
        df = pandas.DataFrame(filminfolist)
        filepath = 'd:\\test\\douban_donghua1.xlsx'
        sheetname = '动画'
        df.to_excel(filepath, sheetname,index=False)  # 大写的D会报错
        excel_file = pandas.read_excel(filepath)
        excel_file.to_csv('donghua2txt.txt', sep='\t', index=False)
    if k == 6:
        df = pandas.DataFrame(filminfolist)
        filepath = 'd:\\test\\douban_xuanyi1.xlsx'
        sheetname =  '悬疑'
        df.to_excel(filepath, sheetname,index=False)  # 大写的D会报错
        excel_file = pandas.read_excel(filepath)
        excel_file.to_csv('xuanyi2txt.txt', sep='\t', index=False)
    if k == 7:
        df = pandas.DataFrame(filminfolist)
        filepath = 'd:\\test\\douban_jingsong1.xlsx'
        sheetname = '惊悚'
        df.to_excel(filepath, sheetname,index=False)  # 大写的D会报错
        excel_file = pandas.read_excel(filepath)
        excel_file.to_csv('jingsong2txt.txt', sep='\t', index=False)
    if k == 8:
        df = pandas.DataFrame(filminfolist)
        filepath = 'd:\\test\\douban_kongbu1.xlsx'
        sheetname = '恐怖'
        df.to_excel(filepath, sheetname,index=False)  # 大写的D会报错
        excel_file = pandas.read_excel(filepath)
        excel_file.to_csv('kongbu2txt.txt', sep='\t', index=False)
    if k == 9:
        df = pandas.DataFrame(filminfolist)
        filepath = 'd:\\test\\douban_jilupian1.xlsx'
        sheetname = '纪录片'
        df.to_excel(filepath, sheetname,index=False)  # 大写的D会报错
        excel_file = pandas.read_excel(filepath)
        excel_file.to_csv('jilupian2txt.txt', sep='\t', index=False)
    if k == 10:
        df = pandas.DataFrame(filminfolist)
        filepath = 'd:\\test\\douban_jiating1.xlsx'
        sheetname = '家庭'
        df.to_excel(filepath, sheetname,index=False)  # 大写的D会报错
        excel_file = pandas.read_excel(filepath)
        excel_file.to_csv('jiating2txt.txt', sep='\t', index=False)
    if k == 11:
        df = pandas.DataFrame(filminfolist)
        filepath = 'd:\\test\\douban_fanzui1.xlsx'
        sheetname = '犯罪'
        df.to_excel(filepath, sheetname,index=False)  # 大写的D会报错
        excel_file = pandas.read_excel(filepath)
        excel_file.to_csv('fanzui2txt.txt', sep='\t', index=False)
    if k == 12:
        df = pandas.DataFrame(filminfolist)
        filepath = 'd:\\test\\douban_qihuan1.xlsx'
        sheetname ='奇幻'
        df.to_excel(filepath, sheetname,index=False)  # 大写的D会报错
        excel_file = pandas.read_excel(filepath)
        excel_file.to_csv('qihuan2txt.txt', sep='\t', index=False)
    if k == 13:
        df = pandas.DataFrame(filminfolist)
        filepath = 'd:\\test\\douban_maoxian1.xlsx'
        sheetname = '冒险'#有问题，excel的rank有问题
        df.to_excel(filepath, sheetname,index=False)  # 大写的D会报错
        excel_file = pandas.read_excel(filepath)
        excel_file.to_csv('maoxian2txt.txt', sep='\t', index=False)
    print(k)
    filminfolist=[]

# 导入相关库
import requests
from lxml import etree
#from openpyxl import workbook  # 写入Excel表所用
#from openpyxl import load_workbook  # 读取Excel表所用
from bs4 import BeautifulSoup as bs
import xlwt
import os
print(os.getcwd())
#os.chdir('C:\Users\19652\Desktop')  # 更改工作目录为桌面
fb=open('豆瓣电影.txt','w',encoding='utf-8')
# 1.将目标网页的内容请求下来
headers = {
    "User-Agent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36",
    "Referer": "https://www.douban.com/"
}
douban_url = "https://movie.douban.com/cinema/nowplaying/xian/"
response = requests.get(douban_url, headers=headers)
douban_text = response.text

# 2.将抓取的数据进行处理
html_element = etree.HTML(douban_text)
ul = html_element.xpath('//ul[@class="lists"]')[0]
lis = ul.xpath('./li')
movies = []
titles=[]
scores=[]
stars=[]
durations=[]
regions=[]
directors=[]
actorss=[]
posts=[]
for li in lis:
    title = li.xpath('./@data-title')[0]
    score = li.xpath('./@data-score')[0]
    star = li.xpath('./@data-star')[0]
    duration = li.xpath('./@data-duration')[0]
    region = li.xpath('./@data-region')[0]
    director = li.xpath('./@data-director')[0]
    actors = li.xpath('./@data-actors')[0]
    post = li.xpath('.//img/@src')[0]
    movie = {
        "title": title,
        "score": score,
        "star": star,
        "duration": duration,
        "region": region,
        "director": director,
        "actors": actors,
        "post": post
    }
    titles.append(title)
    scores.append(score)
    stars.append(star)
    durations.append(duration)
    regions.append(region )
    directors.append(director)
    actorss.append(actors)
    posts.append(post)
    movies.append(movie)
    rows = ''
for movie in movies:
    #print(movie['title'])
    row = '<tr><td>{}</td><td>{}</td><td>{}</td><td>{}</td><td>{}</td><td>{}</td><td>{}</td></tr>'.format(
        movie['title'],
        movie['score'],
        movie['star'],
        movie['duration'],
        movie['region'],
        movie['director'],
        movie['actors']
        )
    # 利用字符串拼接循环存储每个格式化的电影票房信息
    rows = rows + '\n' + row  # 利用字符串拼接处格式化的HTML页面
    piaofang_html = ''' <!DOCTYPE html> <html> <head>
                 <meta charset="UTF-8">
                      <title>豆瓣电影</title> </head> <body>
                      <tittle>豆瓣电影</tittle>
                           <style>
                                .table1_5 table {         width:100%;         margin:15px 0     }
                                     .table1_5 th {         background-color:#00BFFF;         color:#FFFFFF     }
                                          .table1_5,.table1_5 th,.table1_5 td     
                                          {         font-size:0.95em;
                                                   text-align:center;
                                                            padding:4px;
                                                                     border:1px solid #dddddd;
                                                                              border-collapse:collapse     }
                                                                                   .table1_5 tr:nth-child(odd){         background-color:#aae9fe;     }
                                                                                        .table1_5 tr:nth-child(even){         background-color:#fdfdfd;     }
                                                                                             </style>     <table class='table1_5'> 
                                                                                                 <tr>     <th>电影名</th>     
                                                                                                 <th>评分</th>
                                                                                                <th>星级</th>
                                                                                                <th>时长</th>
                                                                                                <th>地区</th>
                                                                                                <th>导演</th>
                                                                                                      <th>演员</th>
                                                                                                               </tr>     ''' \
                    + rows + '''     </table> </body> </html>     '''
    # 存储已经格式化的html页面
with open('douban.html', 'w', encoding='utf-8') as f :
    f.write(piaofang_html)
#fb=open('豆瓣电影.xlsx','w',encoding='utf-8')
#ws.append(['电影名', '评分', '五角星', '时长','国家/地区','导演', '主演', '海报'])

    #   读取存在的Excel表测试
    #     wb = load_workbook('test.xlsx') #加载存在的Exce
import xlwt
book = xlwt.Workbook(encoding='utf-8',style_compression=0)
sheet = book.add_sheet('mysheet',cell_overwrite_ok=True)
movies_info=["电影名", "评分", "五角星","时长","国家/地区","导演", "主演", "海报"]
for j in range(8):
    sheet.write(0,j,movies_info[j])

for i in range(len(titles)):
    sheet.write(i+1,0,titles[i])
    sheet.write(i+1,1,scores[i])
    sheet.write(i+1,2,stars[i])
    sheet.write(i+1,3,durations[i])
    sheet.write(i + 1, 4, regions[i])
    sheet.write(i + 1, 5, directors[i])
    sheet.write(i + 1, 6, actorss[i])
    sheet.write(i + 1, 7, posts[i])
print("结束")
book.save('douban.xls')
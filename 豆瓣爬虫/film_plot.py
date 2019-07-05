import matplotlib.pyplot as plt
import jieba
from wordcloud import WordCloud
text=open(r'.\jay.txt','r').read()
#print(text)
cut_text=jieba.cut(text)
# print(type(cut_text))
# print(next(cut_text))
# print(next(cut_text))
result='/'.join(cut_text)
# print(result)
wc=WordCloud(
    font_path=r'.\simhei.ttf',
    background_color='white',
    width=1000,
    height=500,
    max_font_size=300,
    min_font_size=10,
)
#插卡
wc.generate(cut_text)
wc.to_file(r'.\wordcloud.png')
from datetime import timedelta
from datetime import datetime
d = datetime(100, 1, 1).today()
d1 = str(d)
text=d1[0]+d1[1]+d1[2]+d1[3]+d1[5]+d1[6]+d1[8]+d1[9]
print(text)
for i in [-1,0,1,2,3]:
    delta = timedelta(i)
    d1 = d-delta
    d1 = str(d1)
    text=d1[0]+d1[1]+d1[2]+d1[3]+d1[5]+d1[6]+d1[8]+d1[9]
    print(text)
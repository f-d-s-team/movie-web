from mysql import connector


def writeToDB(conn: connector, tbname: str, data: list, colnames: tuple = ()):
    if len(data)> 0:
        cursor = conn.cursor()
        colnum = len(data[0])
        sql = "INSERT INTO `" + tbname + "` "
        if len(colnames) > 0:
            sql += '('
            for col in colnames[:-1]:
                sql += "`" + col + "`,"
            sql += "`"+colnames[-1] + "`"+')'
        sql += " values (" + "%s,"*(colnum-1) + "%s)"
        cursor.executemany(sql, data)
        conn.commit()

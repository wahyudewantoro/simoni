SELECT hari FROM (SELECT DATE_FORMAT(a.tgl,'%d') hari,IFNULL(omset,0) omset,a.tgl FROM (SELECT * FROM
        (SELECT ADDDATE('1970-01-01',t4.i*10000 + t3.i*1000 + t2.i*100 + t1.i*10 + t0.i) tgl FROM
        (SELECT 0 i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 
        6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) t0,
        (SELECT 0 i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 
        6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) t1,
        (SELECT 0 i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 
        6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) t2,
        (SELECT 0 i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 
        6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) t3,
        (SELECT 0 i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 
        6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) t4) v
        WHERE DATE_FORMAT(tgl,'%Y-%m') = '2020-01') a LEFT JOIN (
        SELECT DATE(tgl_transaksi) tgl, SUM(jumlah) AS omset FROM tb_transaksi_dept
        WHERE DATE_FORMAT(tgl_transaksi,'%Y-%m') = '2020-01' AND npwpd = '000000000000'
        GROUP BY DATE(tgl_transaksi))b ON a.tgl=b.tgl) c WHERE omset = 0 AND DAY(tgl) < DAY(CURRENT_DATE);
        
        SELECT hari FROM (SELECT DATE_FORMAT(a.tgl,'%d') hari,IFNULL(omset,0) omset,a.tgl FROM (SELECT * FROM
        (SELECT ADDDATE('1970-01-01',t4.i*10000 + t3.i*1000 + t2.i*100 + t1.i*10 + t0.i) tgl FROM
        (SELECT 0 i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 
        6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) t0,
        (SELECT 0 i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 
        6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) t1,
        (SELECT 0 i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 
        6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) t2,
        (SELECT 0 i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 
        6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) t3,
        (SELECT 0 i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 
        6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) t4) v
        WHERE DATE_FORMAT(tgl,'%Y-%m') = DATE_FORMAT('2020-01-01','%Y-%m')) a LEFT JOIN (
        SELECT DATE(tgl_transaksi) tgl, SUM(jumlah) AS omset FROM tb_transaksi_dept
        WHERE DATE_FORMAT(tgl_transaksi,'%Y-%m') = DATE_FORMAT('2020-01-01','%Y-%m') AND npwpd = '000000000000'
        GROUP BY DATE(tgl_transaksi))b ON a.tgl=b.tgl) c WHERE omset = 0 AND DAY(tgl) < DAY(CURRENT_DATE);
        
        DELETE FROM tb_transaksi_dept WHERE npwpd = '000000000000' AND DATE_FORMAT(tgl_transaksi,"%Y-%m-%d") = "2020-01-01";
        SELECT * FROM tb_transaksi_dept WHERE npwpd = '000000000000' AND DATE_FORMAT(tgl_transaksi,"%Y-%m") = "2020-01"; 
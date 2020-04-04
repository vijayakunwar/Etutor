SELECT subject.subject_Name FROM user, subject,student WHERE student.user_ID = 7 and user.user_ID = student.user_ID



SELECT subject.subject_Name,book.book_ID,user.user_ID FROM user, subject,student ,book WHERE student.user_ID = 7 and user.user_ID = student.user_ID and book.student_ID = book.student_ID





MariaDB [etutor_db]> select tutor.tutor_ID,tutor.tutor_rate,book_Date from stude
nt,book, tutor,user where user.user_ID = 7 and student.student_ID = book.student
_ID and book.tutor_ID = tutor.tutor_ID;




MariaDB [etutor_db]> select distinct tutor.tutor_ID,tutor.tutor_rate,subject.sub
ject_Name,subject_length,book_Date from student,book, tutor,user,subject where u
ser.user_ID = 7 and student.student_ID = book.student_ID and book.tutor_ID = tut
or.tutor_ID and book.tutor_ID = subject.tutor_ID;
ERROR 2006 (HY000): MySQL server has gone away
No connection. Trying to reconnect...
Connection id:    110
Current database: etutor_db

+----------+------------+--------------+----------------+------------+
| tutor_ID | tutor_rate | subject_Name | subject_length | book_Date  |
+----------+------------+--------------+----------------+------------+
|        1 |         67 | html         |             10 | 2019-10-22 |
|        1 |         67 | html         |             10 | 2019-10-24 |
|        1 |         67 | html         |             10 | 2019-10-19 |
|        1 |         67 | CSS          |              4 | 2019-10-22 |
|        1 |         67 | CSS          |              4 | 2019-10-24 |
|        1 |         67 | CSS          |              4 | 2019-10-19 |
|        1 |         67 | Java         |              5 | 2019-10-22 |
|        1 |         67 | Java         |              5 | 2019-10-24 |
|        1 |         67 | Java         |              5 | 2019-10-19 |
|        2 |        100 | Bio          |              3 | 2019-10-16 |
|        2 |        100 | Bio          |              3 | 2019-10-14 |
|        2 |        100 | Geo          |              4 | 2019-10-16 |
|        2 |        100 | Geo          |              4 | 2019-10-14 |
+----------+------------+--------------+----------------+------------+
13 rows in set (0.01 sec)


MariaDB [etutor_db]> Select subject.subject_Name,tutor.tutor_Mode, tutor.tutor_L
ocation,tutor.tutor_rate as Price,user.user_Fname from tutor, subject,user where
 tutor.tutor_ID = subject.tutor_ID and user.user_ID=tutor.user_ID;
+--------------+------------+----------------+-------+------------+
| subject_Name | tutor_Mode | tutor_Location | Price | user_Fname |
+--------------+------------+----------------+-------+------------+
| html         | online     | springhill     |    67 | vijay      |
| CSS          | online     | springhill     |    67 | vijay      |
| Java         | online     | springhill     |    67 | vijay      |
| Bio          | onsite     | Brisbane CBD   |   100 | tutor      |
| Geo          | onsite     | Brisbane CBD   |   100 | tutor      |
+--------------+------------+----------------+-------+------------+
5 rows in set (0.00 sec)
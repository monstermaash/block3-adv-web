<!-- | Syntax    | Description |
| --------- | ----------- |
| Header    | Title       |
| Paragraph | Text        |

## Employee Table

| employeeID | name | dept |
| ---------- | ---- | ---- |
| 1          | Andy | dev  | -->

## Exercise 1 - Original Table

| UnitID | StudentID | Date     | TutorID | Topic | Room | Grade | Book      | TutEmail     |
| ------ | --------- | -------- | ------- | ----- | ---- | ----- | --------- | ------------ |
| U1     | St1       | 23.02.03 | Tut1    | GMT   | 629  | 4.7   | Deumlich  | tut1@fhbb.ch |
| U2     | St2       | 18.11.02 | Tut3    | Gln   | 631  | 5.1   | Zehnder   | tut3@fhbb.ch |
| U1     | St4       | 23.02.03 | Tut1    | GMT   | 629  | 4.3   | Deumlich  | tut1@fhbb.ch |
| U5     | St2       | 05.05.03 | Tut3    | PhF   | 632  | 4.9   | Dummlers  | tut3@fhbb.ch |
| U4     | St2       | 04.07.03 | Tut5    | AVQ   | 621  | 5.0   | SwissTopo | tut5@fhbb.ch |

student table: StudentID (PK)
| StudentID | Date | Grade |
| --------- | -------- | ----- |
| St1 | 23.02.03 | 4.7 |
| St2 | 18.11.02 | 5.1 |
| St4 | 23.02.03 | 4.3 |
| St2 | 05.05.03 | 4.9 |
| St2 | 04.07.03 | 5.0 |

tutor table: TutorID (PK)
| TutorID | TutEmail | Topic |
| ------- | ------------ | ----- |
| Tut1 | tut1@fhbb.ch | GMT |
| Tut3 | tut3@fhbb.ch | Gln |
| Tut1 | tut1@fhbb.ch | GMT |
| Tut3 | tut3@fhbb.ch | Phf |
| Tut5 | tut5@fhbb.ch | AVQ |

unit table: UnitID (PK)
| UnitID | Date | Room | Book |
| ------ | -------- | ----- | --------- |
| U1 | 23.02.03 | 629 | Deumlich |
| U2 | 18.11.02 | 631 | Zehnder |
| U1 | 23.02.03 | 629 | Deumlich |
| U5 | 05.05.03 | 632 | Dummlers |
| U4 | 04.07.03 | 621 | SwissTopo |

link table: all foreign keys
| StudentID | TutorID | UnitID |
| --------- | ------- | ------ |
| St1 | Tut1 | U1 |
| St2 | Tut3 | U2 |
| St4 | Tut1 | U1 |
| St2 | Tut3 | U5 |
| St2 | Tut5 | U4 |

---

<br><br>

## Exercise 2 - Original Table

| staffNo | dentistName   | patientNo | patientName   | appointment date/time | surgeryNo |
| ------- | ------------- | --------- | ------------- | --------------------- | --------- |
| S1011   | Tony Smith    | P100      | Gillian White | 12-Aug-03 10.00       | S10       |
| S1011   | Tony Smith    | P105      | Jill Bell     | 13-Aug-03 12.00       | S15       |
| S1024   | Helen Pearson | P108      | Ian MacKay    | 12-Sept-03 10.00      | S10       |
| S1024   | Helen Pearson | P108      | Ian MacKay    | 14-Sept-03 10.00      | S10       |
| S1032   | Robin Plevin  | P105      | Jill Bell     | 14-Oct-03 16.30       | S15       |
| S1032   | Robin Plevin  | P110      | John Walker   | 15-Oct-03 18.00       | S13       |

staff table: staffNo (PK)
| staffNo | dentistName |
| ------- | ------------- |
| S1011 | Tony Smith |
| S1011 | Tony Smith |
| S1024 | Helen Pearson |
| S1024 | Helen Pearson |
| S1032 | Robin Plevin |
| S1032 | Robin Plevin |

patient table: patientNo (PK)
| patientNo | patientName |
| --------- | ------------- |
| P100 | Gillian White |
| P105 | Jill Bell |
| P108 | Ian Mackay |
| P108 | Ian Mackay |
| P105 | Jill Bell |
| P110 | John Walker |

appointment table: appointment date/time (PK), staffNo (FK), patientNo (FK)
| staffNo | dentistName | patientNo | appointment date/time | surgeryNo |
| ------- | ------------- | --------- | --------------------- | --------- |
| S1011 | Tony Smith | P100 | 12-Aug-03 10.00 | S10 |
| S1011 | Tony Smith | P105 | 13-Aug-03 12.00 | S15 |
| S1024 | Helen Pearson | P108 | 12-Sept-03 10.00 | S10 |
| S1024 | Helen Pearson | P108 | 14-Sept-03 10.00 | S10 |
| S1032 | Robin Plevin | P105 | 14-Oct-03 16.30 | S15 |
| S1032 | Robin Plevin | P110 | 15-Oct-03 18.00 | S13 |

link table: all foreign keys
| staffNo | patientNo | appointment date/time |
| ------- | --------- | --------------------- |
| S1011 | P100 | 12-Aug-03 10.00 |
| S1011 | P105 | 13-Aug-03 12.00 |
| S1024 | P108 | 12-Sept-03 10.00 |
| S1024 | P108 | 14-Sept-03 10.00 |
| S1032 | P105 | 14-Oct-03 16.30 |
| S1032 | P110 | 15-Oct-03 18.00 |

---

<br><br>

## Exercise 3 - Original Table

| NIN      | contractNo | hoursPerWeek | eName        | hotelNo | hotelLocation |
| -------- | ---------- | ------------ | ------------ | ------- | ------------- |
| 113567WD | C1024      | 16           | John Smith   | H25     | Edinburgh     |
| 234111XA | C1024      | 24           | Diane Hocine | H25     | Edinburgh     |
| 712670YD | C1025      | 28           | Sarah White  | H4      | Glasgow       |
| 113567WD | C1025      | 16           | John Smith   | H4      | Glasgow       |

employee:
nin (PK)
hoursPerWeek
eName

contract:
contractNo (PK)
hotelNo (FK)
hotelLocation

hotel:
hotelNo (PK)
hotelLocation

link-table:
nin (FK)
contractNo (FK)
hotelNo (FK)

---

<br><br>

## Exercise 4 - Original Table

| EMPLOYEE_ID | NAME  | JOB_CODE | JOB       | STATE_CODE | HOME_STATE |
| ----------- | ----- | -------- | --------- | ---------- | ---------- |
| E001        | Alice | J01      | Chef      | 26         | Michigan   |
| E001        | Alice | J02      | Waiter    | 26         | Michigan   |
| E002        | Bob   | J02      | Waiter    | 56         | Wyoming    |
| E002        | Bob   | J03      | Bartender | 56         | Wyoming    |
| E003        | Alice | J01      | Chef      | 56         | Wyoming    |

employee:
employeeID (PK)
name

job:
jobCode (PK)
job

location:
stateCode (PK)
homeState

link-table:
employeeID (FK)
jobCode (FK)
stateCode (FK)

---

<br><br>

## Exercise 5 - Original Table

| Book                                  | Genre                   | Author      | Author Nationality |
| ------------------------------------- | ----------------------- | ----------- | ------------------ |
| Twenty Thousand Leagues Under the Sea | Science Fiction         | Jules Verne | French             |
| Journey to the Center of the Earth    | Science Fiction         | Jules Verne | French             |
| Leaves of Grass                       | Poetry                  | Walt Whiman | American           |
| Anna Karenina                         | Literary Fiction        | Leo Tolstoy | Russian            |
| A Confession                          | Religious Autobiography | Leo Tolstoy | Russian            |

book:
book (PK)
author (FK)

author:
author (PK)
author nationality

genre:
book (FK)
genre (PK)

link-table:
book (FK)
author (FK)
genre (FK)

---

<br><br>

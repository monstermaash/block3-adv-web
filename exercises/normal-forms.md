## Exercise 1 - Original Table

| UnitID | StudentID | Date     | TutorID | Topic | Room | Grade | Book      | TutEmail     |
| ------ | --------- | -------- | ------- | ----- | ---- | ----- | --------- | ------------ |
| U1     | St1       | 23.02.03 | Tut1    | GMT   | 629  | 4.7   | Deumlich  | tut1@fhbb.ch |
| U2     | St2       | 18.11.02 | Tut3    | Gln   | 631  | 5.1   | Zehnder   | tut3@fhbb.ch |
| U1     | St4       | 23.02.03 | Tut1    | GMT   | 629  | 4.3   | Deumlich  | tut1@fhbb.ch |
| U5     | St2       | 05.05.03 | Tut3    | PhF   | 632  | 4.9   | Dummlers  | tut3@fhbb.ch |
| U4     | St2       | 04.07.03 | Tut5    | AVQ   | 621  | 5.0   | SwissTopo | tut5@fhbb.ch |

<br>

- student table: StudentID (primary key)

| StudentID | Date     | Grade |
| --------- | -------- | ----- |
| St1       | 23.02.03 | 4.7   |
| St2       | 18.11.02 | 5.1   |
| St4       | 23.02.03 | 4.3   |
| St2       | 05.05.03 | 4.9   |
| St2       | 04.07.03 | 5.0   |

- tutor table: TutorID (primary key)

  | TutorID | TutEmail     | Topic |
  | ------- | ------------ | ----- |
  | Tut1    | tut1@fhbb.ch | GMT   |
  | Tut3    | tut3@fhbb.ch | Gln   |
  | Tut1    | tut1@fhbb.ch | GMT   |
  | Tut3    | tut3@fhbb.ch | Phf   |
  | Tut5    | tut5@fhbb.ch | AVQ   |

- unit table: UnitID (primary key)

  | UnitID | Date     | Room | Book      |
  | ------ | -------- | ---- | --------- |
  | U1     | 23.02.03 | 629  | Deumlich  |
  | U2     | 18.11.02 | 631  | Zehnder   |
  | U1     | 23.02.03 | 629  | Deumlich  |
  | U5     | 05.05.03 | 632  | Dummlers  |
  | U4     | 04.07.03 | 621  | SwissTopo |

- link table: all foreign keys

  | StudentID | TutorID | UnitID |
  | --------- | ------- | ------ |
  | St1       | Tut1    | U1     |
  | St2       | Tut3    | U2     |
  | St4       | Tut1    | U1     |
  | St2       | Tut3    | U5     |
  | St2       | Tut5    | U4     |

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

<br>

- staff table: staffNo (primary key)

  | staffNo | dentistName   |
  | ------- | ------------- |
  | S1011   | Tony Smith    |
  | S1011   | Tony Smith    |
  | S1024   | Helen Pearson |
  | S1024   | Helen Pearson |
  | S1032   | Robin Plevin  |
  | S1032   | Robin Plevin  |

- patient table: patientNo (primary key)

  | patientNo | patientName   |
  | --------- | ------------- |
  | P100      | Gillian White |
  | P105      | Jill Bell     |
  | P108      | Ian Mackay    |
  | P108      | Ian Mackay    |
  | P105      | Jill Bell     |
  | P110      | John Walker   |

- appointment table: appointment date/time (primary key), staffNo (foreign key), patientNo (foreign key)

  | staffNo | dentistName   | patientNo | appointment date/time | surgeryNo |
  | ------- | ------------- | --------- | --------------------- | --------- |
  | S1011   | Tony Smith    | P100      | 12-Aug-03 10.00       | S10       |
  | S1011   | Tony Smith    | P105      | 13-Aug-03 12.00       | S15       |
  | S1024   | Helen Pearson | P108      | 12-Sept-03 10.00      | S10       |
  | S1024   | Helen Pearson | P108      | 14-Sept-03 10.00      | S10       |
  | S1032   | Robin Plevin  | P105      | 14-Oct-03 16.30       | S15       |
  | S1032   | Robin Plevin  | P110      | 15-Oct-03 18.00       | S13       |

- link table: all foreign keys

  | staffNo | patientNo | appointment date/time |
  | ------- | --------- | --------------------- |
  | S1011   | P100      | 12-Aug-03 10.00       |
  | S1011   | P105      | 13-Aug-03 12.00       |
  | S1024   | P108      | 12-Sept-03 10.00      |
  | S1024   | P108      | 14-Sept-03 10.00      |
  | S1032   | P105      | 14-Oct-03 16.30       |
  | S1032   | P110      | 15-Oct-03 18.00       |

---

<br><br>

## Exercise 3 - Original Table

| NIN      | contractNo | hoursPerWeek | eName        | hotelNo | hotelLocation |
| -------- | ---------- | ------------ | ------------ | ------- | ------------- |
| 113567WD | C1024      | 16           | John Smith   | H25     | Edinburgh     |
| 234111XA | C1024      | 24           | Diane Hocine | H25     | Edinburgh     |
| 712670YD | C1025      | 28           | Sarah White  | H4      | Glasgow       |
| 113567WD | C1025      | 16           | John Smith   | H4      | Glasgow       |

<br>

- employee table: nin (primary key)

  | NIN      | hoursPerWeek | eName        |
  | -------- | ------------ | ------------ |
  | 113567WD | 16           | John Smith   |
  | 234111XA | 24           | Diane Hocine |
  | 712670YD | 28           | Sarah White  |
  | 113567WD | 16           | John Smith   |

- contract table: contractNo (primary key), hotelNo (foreign key)

  | contractNo | hotelNo | hotelLocation |
  | ---------- | ------- | ------------- |
  | C1024      | H25     | Edinburgh     |
  | C1024      | H25     | Edinburgh     |
  | C1025      | H4      | Glasgow       |
  | C1025      | H4      | Glasgow       |

- hotel table: hotelNo (primary key)

  | hotelNo | hotelLocation |
  | ------- | ------------- |
  | H25     | Edinburgh     |
  | H25     | Edinburgh     |
  | H4      | Glasgow       |
  | H4      | Glasgow       |

- link table: all foreigh keys

  | NIN      | contractNo | hotelNo |
  | -------- | ---------- | ------- |
  | 113567WD | C1024      | H25     |
  | 234111XA | C1024      | H25     |
  | 712670YD | C1025      | H4      |
  | 113567WD | C1025      | H4      |

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

<br>

- employee table: EMPLOYEE_ID (primary key)

  | EMPLOYEE_ID | NAME  |
  | ----------- | ----- |
  | E001        | Alice |
  | E001        | Alice |
  | E001        | Bob   |
  | E001        | Bob   |
  | E003        | Alice |

- job table: JOB_CODE (primary key)

  | JOB_CODE | JOB       |
  | -------- | --------- |
  | J01      | Chef      |
  | J02      | Waiter    |
  | J02      | Waiter    |
  | J03      | Bartender |
  | J01      | Chef      |

- job table: STATE_CODE (primary key)

  | STATE_CODE | HOME_STATE |
  | ---------- | ---------- |
  | 26         | Michigan   |
  | 26         | Waiter     |
  | 56         | Waiter     |
  | 56         | Bartender  |
  | 56         | Chef       |

- link table: all foreign keys

  | EMPLOYEE_ID | JOB_CODE | STATE_CODE |
  | ----------- | -------- | ---------- |
  | E001        | J01      | 26         |
  | E001        | J02      | 26         |
  | E001        | J02      | 56         |
  | E001        | J03      | 56         |
  | E003        | J01      | 56         |

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

<br>

- book table: book (primary key), author (foreign key)

  | book                                  | author      |
  | ------------------------------------- | ----------- |
  | Twenty Thousand Leagues Under the Sea | Jules Verne |
  | Journey to the Center of the Earth    | Jules Verne |
  | Leaves of Grass                       | Walt Whiman |
  | Anna Karenina                         | Leo Tolstoy |
  | A Confession                          | Leo Tolstoy |

- author table: author (primary key)

  | author      | author nationality |
  | ----------- | ------------------ |
  | Jules Verne | French             |
  | Jules Verne | French             |
  | Walt Whiman | American           |
  | Leo Tolstoy | Russian            |
  | Leo Tolstoy | Russian            |

- genre table: book (foreign key), genre (primary key)

  | book                                  | genre                  |
  | ------------------------------------- | ---------------------- |
  | Twenty Thousand Leagues Under the Sea | Science Fiction        |
  | Journey to the Center of the Earth    | Science Fiction        |
  | Leaves of Grass                       | Poetry                 |
  | Anna Karenina                         | Literary Fiction       |
  | A Confession                          | Religious Autobiogrphy |

- link table: all foreign keys

  | book                                  | author      | genre                   |
  | ------------------------------------- | ----------- | ----------------------- |
  | Twenty Thousand Leagues Under the Sea | Jules Verne | Science Fiction         |
  | Journey to the Center of the Earth    | Jules Verne | Science Fiction         |
  | Leaves of Grass                       | Walt Whiman | Poetry                  |
  | Anna Karenina                         | Leo Tolstoy | Literary Fiction        |
  | A Confession                          | Leo Tolstoy | Religious Autobiography |

---

<br><br>

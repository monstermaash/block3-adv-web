## Pet Store DB Schema in 3NF

- species table: speciesID (primary key)

| speciesID | speciesName |
| --------- | ----------- |
| 1         | Cat         |
| 2         | Dog         |
| 2         | Dog         |
| 2         | Dog         |
| 3         | Duck        |

- breeds table: breedID (primary key), speciesID (foreign key)

| breedID | breedName                | speciesID |
| ------- | ------------------------ | --------- |
| B1      | Persian Tabby            | 1         |
| B2      | White Labrador Retriever | 2         |
| B3      | Great Dane               | 2         |
| B4      | Mini Sheepadoodle        | 2         |
| B5      | Swedish Duck             | 3         |

- pets table: petID (primary key), breedID (foreign key)

  | petID | petName    | breedID | adoptionPrice |
  | ----- | ---------- | ------- | ------------- |
  | P1    | Garfield   | B1      | 5             |
  | P2    | Brian      | B2      | 50            |
  | P3    | Scooby Doo | B3      | 15            |
  | P4    | Snoopy     | B4      | 24            |
  | P5    | Daffy      | B5      | 100           |

- toys table: toyID (primary key)

  | toyID | toyName       | speciesID | toyPrice |
  | ----- | ------------- | --------- | -------- |
  | T1    | Ball          | 2         | 8        |
  | T2    | Chewing Toy   | 2         | 14       |
  | T3    | Laser Pointer | 1         | 7        |
  | T4    | Squeaky Toy   | 2         | 13       |
  | T5    | Feather Wand  | 1         | 15       |

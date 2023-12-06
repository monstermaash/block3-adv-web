# Pet Store DB Schema in 3NF

## Species Table

- species table: speciesID (primary key)

| speciesID | speciesName |
| --------- | ----------- |
| 1         | Cat         |
| 2         | Dog         |
| 3         | Duck        |

## Breeds Table

- breeds table: breedID (primary key), speciesID (foreign key)

| breedID | breedType | speciesID | Description      |
| ------- | --------- | --------- | ---------------- |
| B1      | Pure      | 1         | Purebred Cat     |
| B2      | Mixed     | 2         | Mixed Breed Dog  |
| B1      | Pure      | 2         | Purebred Dog     |
| B2      | Mixed     | 3         | Mixed Breed Duck |

## Pets Table

- pets table: petID (primary key), speciesID (foreign key)

| petID | petName    | breedType | speciesID | age | gender | description                    |
| ----- | ---------- | --------- | --------- | --- | ------ | ------------------------------ |
| P1    | Garfield   | Pure      | 1         | 12  | male   | known for his love of lasagna. |
| P2    | Brian      | Mixed     | 2         | 14  | male   | is always full of energy.      |
| P3    | Scooby Doo | Pure      | 2         | 9   | male   | known for his love of snacks.  |
| P4    | Snoopy     | Pure      | 2         | 6   | male   | has a vivid imagination.       |
| P5    | Daffy      | Mixed     | 3         | 100 | male   | known for his animated antics. |
| P6    | Daisy      | Pure      | 1         | 5   | female | is playful and gentle.         |

## Dog Table

- Dog table: petID (primary key)

| petID | size   |
| ----- | ------ |
| P2    | Medium |
| P3    | Large  |
| P4    | Small  |

## Cat Table

- Cat table: petID (primary key)

| petID | furType      |
| ----- | ------------ |
| P1    | long-haired  |
| P6    | short-haired |

## Duck Table

- Duck table: petID (primary key)

| petID | featherColor |
| ----- | ------------ |
| P5    | mixed        |

## Toys Table

- toys table: toyID (primary key)

| toyID | toyName      | description                | applicableSpecies | toysPrice |
| ----- | ------------ | -------------------------- | ----------------- | --------- |
| T1    | Ball         | A classic ball for dogs.   | dogs              | 8         |
| T2    | Chewing Toy  | Durable toy for chewing.   | dogs              | 14        |
| T3    | Laser Pointe | Provides interactive play. | cats              | 7         |
| T4    | Squeaky Toy  | Makes squeaky sounds.      | dogs              | 13        |
| T5    | Feather Wand | Stimulating feather toy.   | cats              | 15        |

## Adoption Table

- adoption table: petID (primary key)

| petID | isTrained | isVaccinated | adoptionPrice |
| ----- | --------- | ------------ | ------------- |
| P1    | No        | Yes          | 500           |
| P2    | Yes       | No           | 600           |
| P3    | Yes       | Yes          | 1350          |
| P4    | Yes       | Yes          | 900           |
| P5    | No        | No           | 200           |
| P6    | Yes       | Yes          | 350           |

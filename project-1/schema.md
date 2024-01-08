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

| breedID | breedType | speciesID | breedDescription |
| ------- | --------- | --------- | ---------------- |
| 1       | Pure      | 1         | Purebred Cat     |
| 2       | Mixed     | 2         | Mixed Breed Dog  |
| 3       | Pure      | 2         | Purebred Dog     |
| 4       | Mixed     | 3         | Mixed Breed Duck |

## Size Table

| sizeID | size   | sizeDescription                   |
| ------ | ------ | --------------------------------- |
| 1      | Small  | Suitable for apartment living     |
| 2      | Medium | Adaptable to various environments |
| 3      | Large  | Requires ample space and exercise |

## FurSize Table

| furSizeID | furType | furSizeDescription                   | sheddingLevel |
| --------- | ------- | ------------------------------------ | ------------- |
| 1         | Short   | Low maintenance, easy to groom       | Low           |
| 2         | Medium  | Moderate-length, plush, soft coat    | Moderate      |
| 3         | Long    | Luxurious, requires regular brushing | High          |

## Pets Table

- pets table: petID (primary key), speciesID (foreign key)

| petID | petName    | breedType | speciesID | age | gender | petDescription                 | adoptionPricingID | isVaccinated | isTrained | size   | furType |
| ----- | ---------- | --------- | --------- | --- | ------ | ------------------------------ | ----------------- | ------------ | --------- | ------ | ------- |
| 1     | Garfield   | Pure      | 1         | 12  | Male   | known for his love of lasagna. | 1                 | Yes          | No        | Medium | Medium  |
| 2     | Brian      | Mixed     | 2         | 14  | Male   | is always full of energy.      | 2                 | No           | Yes       | Medium | Medium  |
| 3     | Scooby Doo | Pure      | 2         | 9   | Male   | known for his love of snacks.  | 3                 | Yes          | Yes       | Large  | Short   |
| 4     | Snoopy     | Pure      | 2         | 6   | Male   | has a vivid imagination.       | 4                 | Yes          | Yes       | Small  | Short   |
| 5     | Daffy      | Mixed     | 3         | 100 | Male   | known for his animated antics. | 5                 | No           | No        | Small  | Long    |
| 6     | Daisy      | Pure      | 1         | 5   | Female | is playful and gentle.         | 5                 | Yes          | Yes       | Medium | Long    |

## Dog Table

- Dog table: petID (primary key)

| petID | size   |
| ----- | ------ |
| 2     | Medium |
| 3     | Large  |
| 4     | Small  |

## Cat Table

- Cat table: petID (primary key)

| petID | furType |
| ----- | ------- |
| 1     | Long    |
| 6     | Short   |

## Duck Table

- Duck table: petID (primary key)

| petID | featherColor |
| ----- | ------------ |
| 5     | Mixed        |

## Toys Table

- toys table: toyID (primary key)

| toyID | toyName       | toyDescription             | species | toysPricingID |
| ----- | ------------- | -------------------------- | ------- | ------------- |
| 1     | Ball          | A classic ball for dogs.   | Dogs    | 1             |
| 2     | Chewing Toy   | Durable toy for chewing.   | Dogs    | 2             |
| 3     | Laser Pointer | Provides interactive play. | Cats    | 3             |
| 4     | Squeaky Toy   | Makes squeaky sounds.      | Dogs    | 4             |
| 5     | Feather Wand  | Stimulating feather toy.   | Cats    | 5             |

## ToyPricing Table

| toyPricingID | toyPrice |
| ------------ | -------- |
| 1            | 8        |
| 2            | 14       |
| 3            | 7        |
| 4            | 13       |
| 5            | 15       |

## AdoptionPricing Table

| adoptionPricingID | adoptionPrice |
| ----------------- | ------------- |
| 1                 | 500           |
| 2                 | 600           |
| 3                 | 1350          |
| 4                 | 900           |
| 5                 | 200           |
| 6                 | 350           |

<!-- ## Adoption Table

- adoption table: petID (primary key)

| petID | isTrained | isVaccinated | adoptionPrice |
| ----- | --------- | ------------ | ------------- |
| 1     | No        | Yes          | 500           |
| 2     | Yes       | No           | 600           |
| 3     | Yes       | Yes          | 1350          |
| 4     | Yes       | Yes          | 900           |
| 5     | No        | No           | 200           |
| 6     | Yes       | Yes          | 350           | -->

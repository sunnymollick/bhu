# Temple Seeder

This seeder creates demo temple data for testing the filtering functionality.

## What it seeds:

### 12 Demo Temples with various configurations:

1. **Dhakeshwari National Temple** (Dhaka)
   - Residential: Yes
   - Activities: Durga Puja, Kali Puja, Saraswati Puja, Wedding, Gita Class, Yoga, Music

2. **Ramna Kali Mandir** (Dhaka)
   - Residential: No
   - Activities: Kali Puja, Durga Puja, Yoga

3. **Kalibari Temple Gazipur** (Gazipur)
   - Residential: Yes
   - Activities: Kali Puja, Durga Puja, Wedding, Upanayan, Annaprashan, Gita Class

4. **Sri Sri Lakshmi Narayan Temple** (Dhaka)
   - Residential: No
   - Activities: Durga Puja, Saraswati Puja, Namakaran, Annaprashan, Music

5. **Chittagong Kali Temple** (Chittagong)
   - Residential: Yes
   - Activities: Kali Puja, Durga Puja, Saraswati Puja, Wedding, Gita Class, Yoga

6. **Chandranath Temple** (Chittagong)
   - Residential: No
   - Activities: Durga Puja, Yoga

7. **Shiva Temple Gazipur** (Gazipur - Kaliakair)
   - Residential: Yes
   - Activities: All ceremonies and educational programs

8. **Durga Mandir Mirpur** (Dhaka)
   - Residential: No
   - Activities: Durga Puja, Kali Puja, Saraswati Puja, Music

9. **Ram Mandir Uttara** (Dhaka)
   - Residential: No
   - Activities: Durga Puja, Wedding, Gita Class, Yoga

10. **Saraswati Mandir Dhanmondi** (Dhaka)
    - Residential: No
    - Activities: Saraswati Puja, Gita Class, Music

11. **Hanuman Temple Gazipur** (Gazipur)
    - Residential: Yes
    - Activities: Durga Puja, Upanayan, Namakaran, Gita Class, Yoga, Music

12. **ISKCON Dhaka** (Dhaka)
    - Residential: Yes
    - Activities: All major festivals and programs

## How to run:

```bash
php artisan db:seed --class=TempleSeeder
```

Or run all seeders:

```bash
php artisan db:seed
```

## Testing the Filters:

After seeding, you can test these filter combinations:

1. **Residential Facility**: 7 temples have residential facilities
2. **Durga Puja**: 10 temples celebrate Durga Puja
3. **Kali Puja**: 5 temples celebrate Kali Puja
4. **Saraswati Puja**: 7 temples celebrate Saraswati Puja
5. **Wedding**: 5 temples perform wedding ceremonies
6. **Upanayan**: 3 temples perform Upanayan ceremonies
7. **Annaprashan**: 3 temples perform Annaprashan ceremonies
8. **Namakaran**: 3 temples perform Namakaran ceremonies
9. **Gita Classes**: 9 temples offer Gita classes
10. **Yoga**: 9 temples offer Yoga/Meditation
11. **Music**: 7 temples offer Music classes

## Division-wise Distribution:

- **Dhaka Division**: 9 temples
  - Dhaka District: 7 temples
  - Gazipur District: 2 temples (one in Kaliakair upazila)
- **Chittagong Division**: 2 temples

## Note:

- Make sure to run the following seeders before TempleSeeder:
  - DivisionSeeder
  - DistrictSeeder
  - UpazilaSeeder
  - ActivityCategorySeeder
  - ActivitySeeder

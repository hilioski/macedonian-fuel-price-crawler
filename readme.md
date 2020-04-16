# Регулаторна комисија за енергетика на РМ (Актуелни Цени API)

## Како се користи?
Овој проект може да го клонирате или да го симнете како .zip фајл, а потоа да го стартувате проектот со помош на Docker или директно доколку имате инсталирано PHP на вашата машина.

## Docker поставувања
`docker-compose up -d`

## Конфигурација
Во `docker-compose.yml` фајлот имате можност да ја сетирате надворешната порта на `php-nginx` контејнерот. Иницијално портата е поставена на `8888`.

## Извршување на скриптата
1) `docker-compose exec php-nginx bash`
2) `cd /app`
3) `composer install`
4) `php index.php`

или

1) Отворете http://localhost:8888 во Вашиот омилен веб пребарувач

* Ова API поддржува Англиска и Македонска верзија (default=mk). Доколку сакате да ги добиете податоците на определен јазик, потребно е да испратите `GET` параметар:
- `language=en` - За англиски јазик
- `language=mk` - За македонски јазик

## Пример за податоци кои ги враќа API-то

Македонска верзија (`language=mk`)
```json
{
    "success": true,
    "results": [
        {
            "name": "ЕУРОСУПЕРБС - 95",
            "price": 48.5,
            "unit": "л",
            "currency": "ден"
        },
        {
            "name": "ЕУРОСУПЕРБС - 98",
            "price": 50.5,
            "unit": "л",
            "currency": "ден"
        },
        {
            "name": "ЕУРОДИЗЕЛ БС (Д-Е V)",
            "price": 45,
            "unit": "л",
            "currency": "ден"
        },
        {
            "name": "ЕКСТРА ЛЕСНО  1(ЕЛ-1)",
            "price": 33,
            "unit": "л",
            "currency": "ден"
        },
        {
            "name": "МАЗУТ М-1 HC",
            "price": 20.106,
            "unit": "кг",
            "currency": "ден"
        },
        {
            "name": "Домаќинства ЕДНОТАРИФНО мерење",
            "price": 4.44,
            "unit": "kWh",
            "currency": "ден"
        },
        {
            "name": "Домаќинства ДВОТАРИФНО мерење (висока тарифа)",
            "price": 5.54,
            "unit": "kWh",
            "currency": "ден"
        },
        {
            "name": "Домаќинства ДВОТАРИФНО мерење (ниска тарифа)",
            "price": 2.78,
            "unit": "kWh",
            "currency": "ден"
        },
        {
            "name": "ВЕТЕРНИ ЕЛЕКТРОЦЕНТРАЛИ ≤ 50 MW",
            "price": 8.9,
            "unit": "kWh",
            "currency": "€центи"
        }
    ]
}
```

Англиска верзија (`language=en`)
```json
{
    "success": true,
    "results": [
        {
            "name": "EUROSUPERBS - 95",
            "price": 48.5,
            "unit": "l",
            "currency": "MKD"
        },
        {
            "name": "EUROSUPERBS - 98",
            "price": 50.5,
            "unit": "l",
            "currency": "MKD"
        },
        {
            "name": "EURODIZEL BS (D-Е V)",
            "price": 45,
            "unit": "l",
            "currency": "MKD"
        },
        {
            "name": "FUEL OIL EXTRA LIGHT  1(EL-1)",
            "price": 33,
            "unit": "l",
            "currency": "MKD"
        },
        {
            "name": "MAZUT M-1 NS",
            "price": 20.106,
            "unit": "kg",
            "currency": "MKD"
        },
        {
            "name": "Households subject to SINGLE-TARIFF metering",
            "price": 4.44,
            "unit": "kWh",
            "currency": "MKD"
        },
        {
            "name": "Households subject to TWO-TARIFF metering peak tariff",
            "price": 5.54,
            "unit": "kWh",
            "currency": "MKD"
        },
        {
            "name": "Households subject to TWO-TARIFF metering off-peak tariff",
            "price": 2.78,
            "unit": "kWh",
            "currency": "MKD"
        },
        {
            "name": "Renewable Energy Sources WIND POWER PLANTS ≤ 50 MW",
            "price": 8.9,
            "unit": "kWh",
            "currency": "€cents"
        }
    ]
}
```

#### * Цените се превземаат од официјалниот сајт на Регулаторна комисија за енергетика на Република Македонија (http://www.erc.org.mk)

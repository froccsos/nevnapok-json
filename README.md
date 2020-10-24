# nevnapok-json
Magyar névnapok json formátumban.

A feltöltött json fájl az alábbi link feldolgozásából készült: https://mek.oszk.hu/00000/00056/html/196.htm

A linken találtható felsorolás utolsó módosítása: 1997. július

Szúrópróbaszerűen ellenőriztem néhány névnap helyességét, azok alapján jónak tűnt.

Formátum:
```
"1": { // hónap
  "1": { // nap
    "main": [ //fő névnapok
      "Fruzsina"
    ],
    "other": [ // nem fő névnapok
      "Álmos",
      "Csombor",
      "Eufrozina",
      "Konkordia",
      "Mária",
      "Marietta",
      "Odiló",
      "Tóbiás",
      "Vászoly",
      "Vazul",
      "Vulkán"
    ]
  }
  }
}
```

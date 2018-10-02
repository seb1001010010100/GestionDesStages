# General development info

##### these are the goals to complete iteration 1

---

Pour litération un on n'a pas besoin de pouvoir modifer les information de compte (student, company).

---

## what every user type can do

### visitor
- create a student account
- login

### student
- view his profile
- view interniship list
- view internship details
- logout

### administrator
- create a company account
- view interniship list
- view internship details
- `add an internship offer`
- `modify internship offer details (status and what not)`
- logout

### company
- `not sure what i do`
- logout

---

## `Make the site accessible online`


---

## user validations
- email is unique
- `password is required and of valid format`

---

Liste de chose a fix ou changer (maybe)
- bouton documentation/api a enlever
- un etudiant n'est pas restrain a voir la liste des etudiants (/students)
- en tant etudiant, liste des millieux de stages dans la bar de nav est impossible a acceder (enlever de la bar de nav?)
- en tant etudiant, voir un stage donne des information incomprehensible (region_id, etc...). Devrais etre le nom, et non l'id.
- en tant que admin, le delete/edit user ne fonctionne pas (methode non-definite)
- en tant que admin, je ne suis pas authorizer a acceder a la location pour delete un internship, une company, et un etudiant. Edit une company non plus.
- edit un etudiant sans changer le email est impossible car le 'email' est toujours utiliser
- delete l'etudiant devrait delete son user.
- l'admin n'a pas access a clienttypes, establishment, genders, missions, ownershipstatuses, regions, sessions
- L'ajout d'une sessions (et meme de tout les autres choses ^) devrait surment etre sur la sidebar.
- en tant que company, je ne suis pas autorise a voir les liste des stages, mais elle est sur la sidebar.
- en tant que company, il n'y a aucun bouton pour creer un stage sur la sidebar.
- la company n'est pas restrain a voir la liste des company
- la page login est accessible pour les 3 type de users (ils sont deja login).

text like `this` means that the function has yet to be implemented

<h1>Informations</h1>

<h2>Auteur</h2>

<p>Damien B. Desjardins</p>

<h2>Cours</h2>

<p>420-267 MO Développer un site Web et une application pour Internet.</p>

<p>Automne 2014, Collège Montmorency.</p>

<h2>Catégrorie d'utilisateur cible</h2>

<p>Puisque cette application web permet de concerver différentes informations
sur les familles des différentes Mafias et sur leurs membres, je crois que cette
application pourrait être intéressante pour les entreprises et/ou organisation
se spécialisant dans le renseignement judiciaire.</p>

<h2>Vérification de l'application</h2>

<h3>Le CRUD</h3>

<p>Tout commence par le CRUD. Afin d'intéragir avec l'applciation, il faut
d'abord se créer un compte. Pour se faire, il faut appuyer sur 'Register' dans
le menu d'en haut. Vous arrivez ensuite à la page de connexion et vous devez
entrer vos informations. Lorsque vous appuyez sur "Add". Votre compte se crée
et un courriel de confirmation est envoyé à l'adresse que vous avez précisée.
Tant que vous de confirmer pas votre adresse courriel, vous êtes un utilisateur
"normal" et ne pouvez que consulter les pages, sans pouvoir ajouter quoi que ce,
soit, comme si vous n'étiez pas inscrit. Lorsque vous confirmez votre adresse
de messagerie, pour devenez "super-utilisateur" et vous pouvez ajouter de
l'informations au site. Vous pouvez aussi modifier l'information que vous 
avez publiée ou la supprimer.</p>

<p>La toute première chose à créer est une Mafia. Il est essentiel d'avoir une
Mafia avant d'avoir des familles. Après la Mafia, il faut une ou plusieurs
familles, puisque les membres en sont dépendants. Les membres, eux, sont liés
à des "Skills". Il faut donc des "Skills" pour pouvoir créer des membres. (Il
y en a déjà par défaut).</p>

<h3>Le menu universel</h3>

<p>Un menu suit l'utilisateur sur toutes les pages en haut du site. Ce menu permet
de se connecter (si personne n'est connectée), d'accéder à son profil (si nous sommes
connectés), de s'inscrire (si personne n'est connectée), de se déconnecter (si nous
sommes connectés), d'accéder un menu relatif à la page courante et de choisir entre
trois langues différante (Anglais, français et italien). Le site est majoritairement
traduit dans les 3 langues, mais il y a quelques lignes textes qui ne sont pas traduites.
Le site est originalement en anglais (sauf cette page).</p>

<h3>La catégorie et sous-catégorie</h3>

<p>Cette fonctionnalité est disponible en ajoutant ou modifiant une famille. Lors de ces
deux actions, l'utilisateur doit entrer la zone d'activité de la famille, donc le pays
et l'état. Il a le choix entre deux pays (Canada ou États-Unis) et les états changent
en conséquence.</p>

<h3>L'autocomplétion</h3>

<p>Le code pour cette fonctionnalité a été ajouté pour l'ajout d'une famille. La
fonctionnalité est attachée au champs "criminal activities". Le code pour l'auto-complete
est fait, mais il ne semble pas fonctionné correctement. Après environ 2 heures de
recherche et de test, l'autocomplete ne focntionne toujours pas.</p>

<h3>Envoie de courriel</h3>

<p>Comme dit plus tôt, lorsqu'un utilisateur se crée, un courriel lui est envoyé.
Le courriel contient un message avec un lien. Lorsque l'utilisateur clique sur ce lien,
son compte, qui était de rang "normal", devient un compte de rang "super-utilisateur".
Tant que l'utilisateur n'a pas activé son compte, un message sous le menu universel
est affiché pour lui dire qu'il doit activier son compte pour pouvoir accéder à toutes
les fonctionnalités du site. Un lien est disponible pour lui à la fin de message afin
de renvoyer le message de confirmation. Malheuresement, ce lien ne semble pas fonctionner
et j'ignore pourquoi.</p>

<h3>Diagramme</h3>
<p>Voici le diagramme utilisé pour la réalisation de ce travail :</p>
<img src="http://www.databaseanswers.org/data_models/mafia_organised_crime/images/data_model.gif"></br>
<a href="http://www.databaseanswers.org/data_models/mafia_organised_crime/index.htm">Source</a>

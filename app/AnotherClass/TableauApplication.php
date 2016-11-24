<?php

class TableauApplication extends AnotherClass
{
 private $id ;
 private $nom ;
 private $domaine ;
 private $description ;
 private $dateModification ;
 private $version ;
 private $nomGarant ;

 function __construct($id, $nom, $domaine, $description, $dateModification, $version, $nomGarant) {
     $this->id = $id;
     $this->nom = $nom;
     $this->domaine = $domaine;
     $this->description = $description;
     $this->dateModification = $dateModification;
     $this->version = $version;
     $this->nomGarant = $nomGarant;
 }

  function getId() {
     return $this->id;
 }

 function getNom() {
     return $this->nom;
 }

 function getDomaine() {
     return $this->domaine;
 }

 function getDescription() {
     return $this->description;
 }

 function getDateModification() {
     return $this->dateModification;
 }

 function getVersion() {
     return $this->version;
 }

 function getNomGarant() {
     return $this->nomGarant;
 }

 function setId($id) {
     $this->id = $id;
 }

 function setNom($nom) {
     $this->nom = $nom;
 }

 function setDomaine($domaine) {
     $this->domaine = $domaine;
 }

 function setDescription($description) {
     $this->description = $description;
 }

 function setDateModification($dateModification) {
     $this->dateModification = $dateModification;
 }

 function setVersion($version) {
     $this->version = $version;
 }

 function setNomGarant($nomGarant) {
     $this->nomGarant = $nomGarant;
 }


}

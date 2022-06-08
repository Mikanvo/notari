<?php

namespace App\Entity;

use App\Repository\DossierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DossierRepository::class)
 */
class Dossier
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numeroOuverture;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numeroClassification;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCreation;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateClassification;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $active;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $etat;

    /**
     * @ORM\Column(type="text")
     */
    private $objet;

    /**
     * @ORM\ManyToOne(targetEntity=Type::class, inversedBy="dossiers")
     */
    private $typeActe;

    /**
     * @ORM\OneToMany(targetEntity=DossierWorkflow::class, mappedBy="dossier",cascade={"persist"})
     */
    private $dossierWorkflows;

    /**
     * @ORM\OneToMany(targetEntity=Identification::class, mappedBy="dossier",cascade={"persist"})
     */
    private $identifications;

    /**
     * @ORM\OneToMany(targetEntity=Piece::class, mappedBy="dossier",cascade={"persist"})
     */
    private $pieces;

    /**
     * @ORM\OneToMany(targetEntity=DocumentSigne::class, mappedBy="dossier",cascade={"persist"})
     */
    private $documentSignes;

    public function __construct()
    {
        $this->dossierWorkflows = new ArrayCollection();
        $this->identifications = new ArrayCollection();
        $this->pieces = new ArrayCollection();
        $this->documentSignes = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroOuverture(): ?string
    {
        return $this->numeroOuverture;
    }

    public function setNumeroOuverture(string $numeroOuverture): self
    {
        $this->numeroOuverture = $numeroOuverture;

        return $this;
    }

    public function getNumeroClassification(): ?string
    {
        return $this->numeroClassification;
    }

    public function setNumeroClassification(string $numeroClassification): self
    {
        $this->numeroClassification = $numeroClassification;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeInterface $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    public function getDateClassification(): ?\DateTimeInterface
    {
        return $this->dateClassification;
    }

    public function setDateClassification(\DateTimeInterface $dateClassification): self
    {
        $this->dateClassification = $dateClassification;

        return $this;
    }



    public function getActive(): ?string
    {
        return $this->active;
    }

    public function setActive(string $active): self
    {
        $this->active = $active;

        return $this;
    }



    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getObjet(): ?string
    {
        return $this->objet;
    }

    public function setObjet(string $objet): self
    {
        $this->objet = $objet;

        return $this;
    }

    public function getTypeActe(): ?Type
    {
        return $this->typeActe;
    }

    public function setTypeActe(?Type $typeActe): self
    {
        $this->typeActe = $typeActe;

        return $this;
    }

    /**
     * @return Collection<int, DossierWorkflow>
     */
    public function getDossierWorkflows(): Collection
    {
        return $this->dossierWorkflows;
    }

    public function addDossierWorkflow(DossierWorkflow $dossierWorkflow): self
    {
        if (!$this->dossierWorkflows->contains($dossierWorkflow)) {
            $this->dossierWorkflows[] = $dossierWorkflow;
            $dossierWorkflow->setDossier($this);
        }

        return $this;
    }

    public function removeDossierWorkflow(DossierWorkflow $dossierWorkflow): self
    {
        if ($this->dossierWorkflows->removeElement($dossierWorkflow)) {
            // set the owning side to null (unless already changed)
            if ($dossierWorkflow->getDossier() === $this) {
                $dossierWorkflow->setDossier(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Identification>
     */
    public function getIdentifications(): Collection
    {
        return $this->identifications;
    }

    public function addIdentification(Identification $identification): self
    {
        if (!$this->identifications->contains($identification)) {
            $this->identifications[] = $identification;
            $identification->setDossier($this);
        }

        return $this;
    }

    public function removeIdentification(Identification $identification): self
    {
        if ($this->identifications->removeElement($identification)) {
            // set the owning side to null (unless already changed)
            if ($identification->getDossier() === $this) {
                $identification->setDossier(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Piece>
     */
    public function getPieces(): Collection
    {
        return $this->pieces;
    }

    public function addPiece(Piece $piece): self
    {
        if (!$this->pieces->contains($piece)) {
            $this->pieces[] = $piece;
            $piece->setDossier($this);
        }

        return $this;
    }

    public function removePiece(Piece $piece): self
    {
        if ($this->pieces->removeElement($piece)) {
            // set the owning side to null (unless already changed)
            if ($piece->getDossier() === $this) {
                $piece->setDossier(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, DocumentSigne>
     */
    public function getDocumentSignes(): Collection
    {
        return $this->documentSignes;
    }

    public function addDocumentSigne(DocumentSigne $documentSigne): self
    {
        if (!$this->documentSignes->contains($documentSigne)) {
            $this->documentSignes[] = $documentSigne;
            $documentSigne->setDossier($this);
        }

        return $this;
    }

    public function removeDocumentSigne(DocumentSigne $documentSigne): self
    {
        if ($this->documentSignes->removeElement($documentSigne)) {
            // set the owning side to null (unless already changed)
            if ($documentSigne->getDossier() === $this) {
                $documentSigne->setDossier(null);
            }
        }

        return $this;
    }
}

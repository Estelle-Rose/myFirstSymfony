<?php

namespace App\Entity;

use App\Entity\Aliment;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\TypeRepository;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=TypeRepository::class)
 * @Vich\Uploadable
 */
class Type
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
    private $libelle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\OneToMany(targetEntity=aliment::class, mappedBy="type")
     */
    private $aliments;

     /**     
     * @Vich\UploadableField(mapping="type_images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated_at;

      public function getImageFile(): ?File
    {
        return $this->imageFile;
    } 

    public function setImageFile(?File $imageFile= null): self
    {
           $this->imageFile = $imageFile;

        if($this->imageFile instanceof UploadedFile) {
            $this->updated_at = new \DateTime('now');
        } 
       return $this; 
    }

    public function __construct()
    {
        $this->aliments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(? string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection|Aliment[]
     */
    public function getAliments(): Collection
    {
        return $this->aliments;
    }

    public function addAliment(Aliment $aliment): self
    {
        if (!$this->aliments->contains($aliment)) {
            $this->aliments[] = $aliment;
            $aliment->setType($this);
        }

        return $this;
    }

    public function removeAliment(aliment $aliment): self
    {
        if ($this->aliments->removeElement($aliment)) {
            // set the owning side to null (unless already changed)
            if ($aliment->getType() === $this) {
                $aliment->setType(null);
            }
        }

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}

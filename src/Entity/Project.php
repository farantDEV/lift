<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjectRepository")
 */
class Project
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

   /**
     * @var string
     *
     * @ORM\Column(type="string")
     * @Assert\NotBlank(message="Enter a name for this project.")
     */
    private $name;
	
	/**
     * @var string
     *
     * @ORM\Column(type="string")
     * @Assert\NotBlank(message="Enter a presentation for this project.")
     */
	private $presentation;
	
	/**
     * @var datetime
     *
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank(message="Enter a starting date for this project.")
     */
	private $startDate;
		
	/**
     * @var datetime
     *
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank(message="Enter a ending date for this project.")
     */
	private $endDate;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     * @Assert\NotBlank(message="Enter a status for this project.")
     */
    private $status;
	
	/**
     * @var string
     *
     * @ORM\Column(type="string")
     *
     */
    private $host;
	
	 /**
     * @var string
     *
     * @ORM\Column(type="string")
     * @Assert\NotBlank(message="Enter a client for this project.")
     */
    private $client;
	
	 /**
     * @var string
     *
     * @ORM\Column(type="string")
     * @Assert\NotBlank(message="Enter a licence for this project.")
     */
    private $licence;
	
	 /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $git;
	
	 /**
     * @var array
     *
     * @ORM\Column(type="json")
     */
    private $tools = [];
	
	/**
     * @var array
     *
     * @ORM\Column(type="json")
     */
    private $contributors = [];
	
	/**
     * @var array
     *
     * @ORM\Column(type="json")
     */
    private $images = [];
	
	/**
     * @var array
     *
     * @ORM\Column(type="json")
     */
    private $Resources = [];
	

    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function getName() {
        return $this->name;
    }
    public function setName($name) {
        $this->name = $name;
        return $this;
    }
	
	public function getPresentation() {
        return $this->presentation;
    }

    public function setPresentation($presentation) {
        $this->presentation = $presentation;
        return $this;
    }
	
	public function getStartDate() {
        return $this->startDate;
    }

    public function setStartDate($startDate) {
        $this->startDate = $startDate;
        return $this;
    }
	
	public function getEndDate() {
        return $this->endDate;
    }

    public function setEndDate($endDate) {
        $this->endDate = $endDate;
        return $this;
    }
	
    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
        return $this;
    }
	
	public function getHost() {
        return $this->host;
    }

    public function setHost($host) {
        $this->host = $host;
        return $this;
    }
	
	public function getClient() {
        return $this->client;
    }

    public function setClient($client) {
        $this->client = $client;
        return $this;
    }
	
	public function getLicence() {
        return $this->licence;
    }

    public function setLicence($licence) {
        $this->licence = $licence;
        return $this;
    }
	
	public function getGit() {
        return $this->git;
    }

    public function setGit($git) {
        $this->git = $git;
        return $this;
    }
	
    public function getTools(): array
    {
   		$tools = $this->tools;
 
        return array_unique($tools);
    }
    public function setTools(array $tools): void
    {
        $this->tools = $tools;
    }
	
	public function getContributors(): array
    {
   		$contributors = $this->contributors;
 
        return array_unique($contributors);
    }
    public function setContributors(array $contributors): void
    {
        $this->contributors = $contributors;
    }
	
	 public function getImages(): array
    {
   		$images = $this->images;
 
        return array_unique($images);
    }
    public function setImages(array $images): void
    {
        $this->images = $images;
    }
	
	public function getResources(): array
    {
   		$resources = $this->resources;
 
        return array_unique($resources);
    }
    public function setResources(array $resources): void
    {
        $this->resources = $resources;
    }
}

<?php

/**
 * class Task
 * @author Nicolas
 * @author Théo Cornu
 */

 Class Task
 {
    private $id;
    private $nameTask;
    private $duration;
    private $dateAdded;
    private $idDashBoard;

    /**
     * Constructor of Task
     */
    public function __construct(?int $id = null, string $nameTask = "" , ?int $duration = null, ?string $dateAdded = "", ?int $idDashBoard = null)
    {
        $this->id = $id;
        $this->nameTask = $nameTask;
        $this->duration = $duration;
        $this->dateAdded = $dateAdded;
        $this->idDashBoard = $idDashBoard;
    }

    /**
     * Get the value of id
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nameTask
     */
    public function getNameTask(): string
    {
        return $this->nameTask;
    }

    /**
     * Set the value of nameTask
     *
     * @return  self
     */
    public function setNameTask(string $nameTask): self
    {
        $this->nameTask = $nameTask;

        return $this;
    }

    /**
     * Get the value of duration
     */
    public function getDuration(): int
    {
        return $this->duration;
    }

    /**
     * Set the value of duration
     *
     * @return  self
     */
    public function setDuration(int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get the value of dateAdded
     */
    public function getDateAdded(): string
    {
        return $this->dateAdded;
    }

    /**
     * Set the value of dateAdded
     *
     * @return  self
     */
    public function setDateAdded(string $dateAdded): self
    {
        $this->dateAdded = $dateAdded;

        return $this;
    }

    /**
     * Get the value of idDashBoard
     */
    public function getIdDashBoard(): int
    {
        return $this->idDashBoard;
    }

    /**
     * Set the value of idDashBoard
     *
     * @return  self
     */
    public function setIdDashBoard(int $idDashBoard): self
    {
        $this->idDashBoard = $idDashBoard;

        return $this;
    }
 }

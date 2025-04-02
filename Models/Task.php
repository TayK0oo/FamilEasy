<?php

/**
 * Class Task
 */
class Task
{
    private ?int $id;
    private string $nameTask;
    private ?int $duration;
    private ?string $dateAdded;
    private ?int $idDashBoard;

    /**
     * Constructor of Task
     */
    public function __construct(?int $id = null, string $nameTask = "", ?int $duration = null, ?string $dateAdded = null, ?int $idDashBoard = null)
    {
        $this->id = $id;
        $this->nameTask = trim($nameTask); // Ensure no leading/trailing spaces.
        $this->duration = is_numeric($duration) ? (int)$duration : null; // Ensure valid integer.
        $this->dateAdded = !empty($dateAdded) ? trim($dateAdded) : null; // Ensure valid date or null.
        $this->idDashBoard = is_numeric($idDashBoard) ? (int)$idDashBoard : null; // Ensure valid integer.
    }

    /**
     * Get the value of id.
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get the value of nameTask.
     */
    public function getNameTask(): string
    {
        return $this->nameTask;
    }

    /**
     * Get the value of duration.
     */
    public function getDuration(): ?int
    {
        return $this->duration; // Allow nullable duration.
    }

    /**
     * Get the value of dateAdded.
     */
    public function getDateAdded(): ?string
    {
        return !empty($this->dateAdded) ? date('Y-m-d', strtotime($this->dateAdded)) : null; // Format date if not null.
    }

    /**
     * Get the value of idDashBoard.
     */
    public function getIdDashBoard(): ?int
    {
        return $this->idDashBoard;
    }

    /**
     * String representation of Task for debugging purposes.
     */
    public function __toString(): string
    {
        return sprintf(
            "ID: %d | Name: %s | Duration: %d | Date: %s | DashboardID: %d",
            $this->id ?? 0,
            empty($this->nameTask) ? "N/A" : htmlspecialchars($this->nameTask),
            empty($this->duration) ? 0 : htmlspecialchars((string)$this->duration),
            empty($this->dateAdded) ? "N/A" : htmlspecialchars((string)$this->dateAdded),
            empty($this->idDashBoard) ? 0 : htmlspecialchars((string)$this->idDashBoard)
        );
    }
}

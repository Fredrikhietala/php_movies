<?php

abstract class Model {
	private $id;
    /**
     * @var Database
     */
	private $db;
	protected $table = '';

	public function __construct(Database $db, $modelData = []) {
        $this->db = $db;
	}

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getById($id) {
        $this->db->getById($this->table, $id);
    }
    public function readAll() {
        return $this->db->readAll($this->table);
	}
    public function readMovies($id) {
        return $this->db->readMovies($this->table, $id);
    }
    public function create($data) {
        return $this->db->create($this->table, $data);
    }
    public function update($id, $data) {
        return $this->db->update($this->table, $id, $data);
    }
    public function delete($id) {
        return $this->db->delete($this->table, $id);
    }
}

<?php

function getPresidentEmployeeNumber(): int | null {
    try {
        $conn = getDBConnection();
        $query = "SELECT employeeNumber FROM employees WHERE reportsTo IS NULL";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $results = $stmt->fetchall();
        if (count($results) > 0) {
            $presidentEmployeeNumber = $results[0]["employeeNumber"];
            return $presidentEmployeeNumber;
        }
    } catch (PDOException $e) {}
    return null;
}

function hasUserPrivileges(int $employeeNumber): bool {
    $presidentEmployeeNumber = getPresidentEmployeeNumber();
    if ($presidentEmployeeNumber == $employeeNumber) {
        return true;
    }

    try {
        $conn = getDBConnection();
        $query = "SELECT reportsTo FROM employees WHERE employeeNumber = :employeeNumber";
        $stmt = $conn->prepare($query);
        $stmt->execute(array(":employeeNumber" => $employeeNumber));
        $results = $stmt->fetchall();
        if (count($results) > 0) {
            $reportsTo = $results[0]["reportsTo"];
            return $reportsTo == $presidentEmployeeNumber;
        }
    } catch (PDOException $e) {
    }
    return false;
}

function getOffices(): array {
    $conn = getDBConnection();
    $query = "SELECT officeCode, city FROM offices";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $offices = $stmt->fetchall();
    
    return $offices;
}

function getEmployees(): array {
    $conn = getDBConnection();
    $query = "SELECT employeeNumber, firstName, lastName FROM employees";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $employees = $stmt->fetchall();
    
    return $employees;
}

function getEmployeeJobTitles(): array {
    $conn = getDBConnection();
    $query = "SELECT DISTINCT jobTitle FROM employees";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $employees = $stmt->fetchall();
    
    return $employees;
}

?>

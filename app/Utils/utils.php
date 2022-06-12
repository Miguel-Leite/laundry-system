<?php

/**
 * function date_utils
 *
 * @param string $date
 * @return string
 */
function date_utils(string $date): string
{
    $date = new DateTime($date);
    return $date->format('d/m/Y');
}

/**
 * function getMonth_utils
 *
 * @param string $key
 * @return string
 */
function getMonth_utils(string $key): string
{
    $months = [
        "Janeiro",
        "Fevereiro",
        "Março",
        "Abril",
        "Maio",
        "Junho",
        "Julho",
        "Agosto",
        "Setembro",
        "Outubro",
        "Novembro",
        "Dezembro"
    ];
    $key = $key-1;
    return $months[$key < 0 ? 0 : $key];
}

/**
 * function formatAmount_utils
 *
 * @param float $price
 * @return mixed
 */
function formatAmount_utils (float $price): mixed
{
	return number_format($price, 2, ",", ".");
}
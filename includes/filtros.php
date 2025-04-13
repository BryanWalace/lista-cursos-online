<?php

function buscarCategoriasUnicas(array $cursos): array {
    $categorias = [];

    foreach ($cursos as $curso) {
        if (!in_array($curso['categoria'], $categorias)) {
            $categorias[] = $curso['categoria'];
        }
    }

    sort($categorias);
    return $categorias;
}

function filtrarCursosPorCategoria(array $cursos, ?string $categoria): array {
    if (empty($categoria)) return $cursos;

    return array_filter($cursos, fn($curso) => $curso['categoria'] === $categoria);
}

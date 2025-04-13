<?php
function buscarCursoPorId($id, $cursos) {
    foreach ($cursos as $curso) {
        if ($curso['id'] == $id) {
            return $curso;
        }
    }
    return null;
}

function converterImgurParaDireto($url) {
    // Se for link do tipo https://imgur.com/itD1ZYH
    if (preg_match('#^https?://imgur\.com/([a-zA-Z0-9]+)$#', $url, $matches)) {
        return "https://i.imgur.com/{$matches[1]}.jpg";
    }
    return $url;
}
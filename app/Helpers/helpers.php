<?php

if (!function_exists("status_btn")) {
    function status_btn($id, $model, $has_value, $param = [], $item = null)
    {
        $isChecked      = ($has_value == 1) ? "checked" : " ";
        $route          = isset($param['route']) ? $param['route'] : route("gopanel.general.status.change");
        $class          = isset($param['class']) ? $param['class'] : 'status ';
        $row            = isset($param['row']) ? $param['row'] : 'status';
        $dataOn         = isset($param['dataOn']) ? $param['dataOn'] : 'Aktiv';
        $dataOff        = isset($param['dataOff']) ? $param['dataOff'] : 'Deaktiv';
        $onStayle       = isset($param['onStayle']) ? $param['onStayle'] : 'success';
        $offStayle      = isset($param['offStayle']) ? $param['offStayle'] : 'danger';
        $dataSize       = isset($param['dataSize']) ? $param['dataSize'] : 'small';
        return '
            <input
                data-bs-toggle="tooltip" data-bs-placement="top" title="Statusu dəyiş"
                class         ="' . $class . '"
                type          = "checkbox"
                data-size     = "' . $dataSize . '"
                data-toggle   = "toggle"
                data-on       = "' . $dataOn . '"
                data-off      = "' . $dataOff . '"
                data-onstyle  = "' . $onStayle . '"
                data-offstyle = "' . $offStayle . '"
                data-route    = "' . $route . '"
                data-row      = "' . $row . '"
                data-id       = "' . $id . '"
                data-model    = "' . $model . '"
                ' . $isChecked . '
            >
        ';
    }
}


if (!function_exists("delete_btn")) {
    function delete_btn($id, $model, $route = null, $param = [], $item = null, $permission = null)
    {
        $class          = isset($param['class']) ? (is_array($param['class']) ? implode(" ", $param['class']) : $param['class']) : 'btn-sm basedelete';
        $icon           = isset($param['icon']) ? $param['icon'] : ' Sil <i class="fas fa-trash-alt"></i> ';
        $hard           = isset($param['hard']) ? $param['hard'] : false;
        $route          = is_null($route) ? route('gopanel.general.delete') : $route;

        return '
            <a
                data-bs-toggle="tooltip" data-bs-placement="top" title="Məlumatı sil"
                href="javascript::void(0)"
                class="btn btn-danger  ' . $class . '"
                data-model="' . $model . '"
                data-id="' . $id . '"
                data-route="' . $route . '"
                data-hard="' . $hard . '"
                data-permission="' . $permission . '"
            >
            ' . $icon . ' </a>
        ';
    }
}



if (!function_exists("edit_btn")) {
    function edit_btn($route = null, $id = null, $param = [], $model = null, $item = null, $href = null)
    {
        $class          = isset($param['class']) ? (is_array($param['class']) ? implode(" ", $param['class']) : $param['class']) : 'baseEdit';
        $icon           = isset($param['icon']) ? $param['icon'] : ' <i class="fas fa-edit"></i> ';
        $route          = is_null($route) ? route('gopanel.general.edit') : $route;
        $href           = !is_null($href) ? 'href="'.$route.'"' : '';
        return '
            <a
            data-bs-toggle="tooltip" data-bs-placement="top" title="Məlumata düzəliş et"
            data-route="' . $route . '"
            class="btn-sm btn btn-info ' . $class . ' "
            data-id="' . $id . '"
            id="edited_' . $id . '"
            ' . $href . '
            >
                ' . $icon . '
                Düzəliş edin
            </a>
        ';
    }
}







if (!function_exists("get_image")) {
    function get_image($link)
    {
        return '/storage/' . $link;
    }
}

if (!function_exists("product_slug")) {
    function product_slug($link)
    {
        return url(app()->getLocale().'/products/'.$link);
    }
}


if (!function_exists("menu_slug")) {
    function menu_slug($menu)
    {
        return url(app()->getLocale().'/'.$menu->slug);
    }
}

if (!function_exists("category_slug")) {
    function category_slug($category)
    {
        return url(app()->getLocale().'/category/'.$category->slug);
    }
}
if (!function_exists("blog_slug")) {
    function blog_slug($blog)
    {
        return url(app()->getLocale().'/blogs/'.$blog->slug);
    }
}






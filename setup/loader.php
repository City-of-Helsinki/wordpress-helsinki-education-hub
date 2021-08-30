<?php 
function educationhub_load_files()
{
    educationhub_include_files(
        educationhub_files()
    );
}

function educationhub_files()
{
	$files = [
        'setup' => [
            'acf-blocks' => [
                    'sponsors-list',
                    'content-fold',
                    'events-list',
                    'news-list'
            ],
            'assets',
            'templates',
            'theme',
            'widgets',
            'string-translations'
        ],
		'post-types' => [
            'sponsors',
			'portfolio',
            'event'
        ],
        'customizer' => [
            'config',
            'config' => [
                'footer'
            ]
        ],
        'functions' => [
            'header'
        ],
        'widgets' => [
            'cf7-footer-widget'
        ]
	];

	return $files;
}


function educationhub_include_files(array $dir_files, string $subdir = '')
{
    $path = get_stylesheet_directory();
    foreach ($dir_files as $dir => $file_or_files) {
        if ( is_array($file_or_files) ) {
            foreach ($file_or_files as $index => $file_or_subdir) {
                if ( is_array($file_or_subdir) ) {
					$dir = $subdir ? $subdir : $dir;
                    educationhub_include_files(
						$file_or_subdir,
						$dir . DIRECTORY_SEPARATOR . $index
					);
                } else {
                    helsinki_include_file($path, $dir, $file_or_subdir);
                }
            }
        } else {
			helsinki_include_file(
				$path,
				$subdir ? $subdir : $dir,
				$file_or_files
			);
        }
    }
}


function educationhub_get_acf_json_path(){
    return join(DIRECTORY_SEPARATOR, [get_stylesheet_directory() ,'setup', 'acf']);
}

add_filter('acf/settings/save_json', 'educationhub_acf_json_save_point');
 
function educationhub_acf_json_save_point( $path ) {
    $path = educationhub_get_acf_json_path();
    return $path;
}

add_filter('acf/settings/load_json', 'educationhub_acf_json_load_point');

function educationhub_acf_json_load_point( $paths ) {
    unset($paths[0]);    
    $paths[] = educationhub_get_acf_json_path();
    
    return $paths;
    
}
install-filemanager:
	rm -rf bundles/filemanager-bundle/
	git clone git@github.com:artgris/FileManagerBundle.git bundles/filemanager-bundle/
	composer dump-autoload


run-tests:
	cd bundles/filemanager-bundle/ && composer install && ./vendor/bin/simple-phpunit


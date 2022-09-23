https://github.com/nervo/yuicompressor but puts it in the right place for https://github.com/markstory/asset_compress for CakePHP 4


# Installation 
Add to composer.json

```json
{
    ...

    "require-dev": {
        ...
        "umer936/cakephp-asset-compress-yuicompressor": "@stable"
    },
    ...
    "scripts": {
        ...
        "post-install-cmd": [
            ...
            "@install-yuicompressor"
        ],
        "post-update-cmd": "@install-yuicompressor",
        ...
        "install-yuicompressor": "CakephpAssetCompressYuicompressor\\Console\\Installer::postUpdate",
        ...
    },
    ...
}
```

This makes it so it installs both on composer install and composer update. 

TODO: 
- In the future, this should check if the file exists and copy the file only if it does not. There's no need to overwrite the yui file if it already exists. 

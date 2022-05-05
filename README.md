https://github.com/nervo/yuicompressor but puts it in the right place for https://github.com/markstory/asset_compress for CakePHP 4


# Installation 
Add to composer.json

```json
{
    ...
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/umer936/cakephp-yuicompressor.git"
        }
    ],
    ...

    "require-dev": {
        ...
        "umer936/cakephp-asset-compress-yuicompressor": "@stable"
    },
    ...
    "scripts": {
        ...
        "post-update-cmd": "CakephpAssetCompressYuicompressor\\Console\\Installer::postUpdate",
        ...
    },
    ...
}
```


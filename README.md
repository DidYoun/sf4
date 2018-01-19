#POC SF4

## Packages

```
> composer require [package]
From SF recipes : 
> server : server
> annotations : annotations
> security : sec-checker
From composer : 
```

## Twig
Configuration
```
Define new namespace 
> paths:
   '%kernel.project_dir%/src/Resources/views': App
> callable by : @App/../template.html.twig
```
## Doctrine
Configuration
```yaml
orm:
  auto_generate_proxy_classes: '%kernel.debug%'
  naming_strategy: doctrine.orm.naming_strategy.underscore
  auto_mapping: false
  mappings:
      # Mapping
      SlabSecurity:
          is_bundle: false
          # Types
          type: yml
          # Path to YAML files
          dir: '%kernel.project_dir%/config/slab/doctrine' 
          alias: Slab 
          # FQDN
          prefix: 'Slab\Component\Security\Entity' 
```


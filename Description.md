Framework Description:
  
    frame_1:
      │
      ├── .htaccess                # 
      ├── index.php                # 
      │
      ├── .gitignore               # 
      │
      ├── config/                  # 
      │   ├── config.php/          # Define Global Path
      │   └── connect.php/         # DB config
      │
      ├── src/                     # MVC
      │   ├── controllers/         # url[0]Contoller.php, func url[1], param rest_url[] 可用smarty.php給view.tpl
      │   ├── core/                # 
      │   ├── models/              # OOP
      │   ├── views/               # controllers->views('route', [param])
      │   │
      │   ├── templates/           # 
      │   │   ├── tcpdf/           # 
      │   │   ├── spreadsheet/     # 
      │   │   └── smarty/          # tpl直接放在view
      │   │
      │   ├── output/              # Output Files
      │   │   ├── tcpdf/           # .pdf
      │   │   └── spreadsheet/     # .xlsx
      │   │
      │   └── uploads/             # 
      │       └── images/          # 
      │
      ├── vendor/                  # 
      │   ├── autoload.php         # 
      │   ├── smarty/              # 
      │   ├── tecnicom/            # 
      │   └── phpoffice/           # 
      │
      └── composer.json            # Composer

      │
      ├── templates/               # Smarty
      │   ├── header.tpl           # 
      │   ├── footer.tpl           # 
      │   └── main.tpl             # 
      │   
      ├── cache/                   # Smarty 缓存文件
      │
      ├── logs/                    # 日志文件
      │   
      ├── spreadsheets/            # Excel 文件模板或生成的文件
      │   └── example_template.xlsx # 示例 Excel 模板
```
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id');
            $table->string('name');
            $table->string('email');
            $table->integer('active');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }
```

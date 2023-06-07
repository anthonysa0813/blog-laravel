# Manejo de artisan

```bash
php artisan
php artisan inspire
php artisan route:list
php artisan make:model Project
php artisan make:controller ProjectController
php artisan make:controller ProjectController --resource

```

# Consola de lenguaje tinker

```bash
php artisan tinker

```

```php
> $user = new App\Models\User
= App\Models\User {#6233}

DB::table('projects')->get()
DB::table('project')->select('title')->get()
DB::table('project')->orderBy('id')->get()
DB::table('project')->orderBy('id', 'DESC')->get()

```

# Bases de datos con ELOQUENT

## Migraciones

- En Laravel Eloquent, las migraciones son una forma de gestionar la estructura de la base de datos en tu aplicación. Una migración es un archivo que contiene instrucciones para crear, modificar o eliminar tablas y columnas en la base de datos.

- Cuando trabajas con Laravel y Eloquent, es común que necesites realizar cambios en la estructura de tu base de datos a medida que tu aplicación evoluciona. Las migraciones te permiten realizar estos cambios de forma controlada y reproducible.

- Una migración en Laravel Eloquent se crea mediante el uso de la línea de comandos de Artisan, la interfaz de línea de comandos de Laravel. Puedes generar una nueva migración con el comando php artisan make:migration nombre_de_la_migracion, donde "nombre_de_la_migracion" es un nombre descriptivo para identificar la migración.

```bash
php artisan make:migration nombre_de_la_migracion
```

- Dentro del archivo de migración generado, puedes utilizar métodos y comandos proporcionados por Eloquent para definir las operaciones de creación, modificación o eliminación de tablas y columnas. Estos métodos incluyen create(), table(), addColumn(), renameColumn(), dropColumn(), entre otros.

- Una vez que hayas definido la migración, puedes ejecutarla con el comando php artisan migrate. Esto aplicará los cambios definidos en la migración a tu base de datos. Laravel también realiza un seguimiento de las migraciones que ya se han ejecutado, lo que te permite deshacer o revertir las migraciones si es necesario.

```bash
php artisan migrate
```

- En resumen, las migraciones en Laravel Eloquent son archivos que te permiten gestionar y realizar cambios en la estructura de la base de datos de tu aplicación de forma controlada y reproducible.

## Creando una migración

- Paso 1: crear una migración.

```bash
php artisan make:migration create_projects_table
php artisan make:migration create_projects_table --create=proyectos # aqui le estamos dando un nombre a la migración

```

- Paso 2: crear tablas o columnas en nuestra migración

```php
   public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('image');
            $table->timestamps();
        });
    }
```

- Paso 3: Correr la migración

```bash
php artisan migrate
```

## Recuperar información

```php
# una forma de traer información de la base de datos
$projects = DB::table('project')->get()
```

# Introducción a Eloquent

- todas nuestras tablas creadas en Laravel tiene acceso a un modelo
- En el ejemplo hemos hecho una migración para crear una tabla en mysql para projects con sus columnas respectivas.
- Para acceder como modelo desde nuestro controller debemos de crear un modelo archivo.

```bash
php artisan make:model Project
```

- tiene que ser en singular, ya que este va a ser la busqueda en la DB a una tabla llamada "projets".

```php
# ProjectController

class ProjectController extends Controller
{
    public function show(){
    // $projects = DB::table('projects')->get();
    $projects = Project::get();
    return view('welcome')->with('projects', $projects);
    }
};
```

## Factories

- Nos ayuda a llenar de datos nuestra DB. La información es ficticia.
- El archivo está en database/factories

```bash
# creando una factory
php artisan make:factory <name_factory>
php artisan make:factory ProjectFactory
```

```php
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'image' => $this->faker->imageUrl(),
        ];
    }
}
```

## Creando los factories

```php
# tinker
App\Models\Project::factory()->create()
App\Models\Project::factory()->times(5)->create()
```

## Borra toda la base de datos

```bash
php artisan migrate:fresh
```

# Seeders

- Automatiza los factories por asi decirlo.
- esta en: database/seeders

## Corriendo los seeders

```bash
php artisan db:seed
```

# Creando un archivo seed

```bash
php artisan make:seed ProjectsSeeder
```

# Crear un modelo, migración y factory

```bash
php artisan make:model Comment -mf
```

# Crear un proyecto

```php
public function store(Request $request)
    {
        Project::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image
        ]);
        return redirect('/');
    }
```

# Actualizar un proyecto

```php
public function update(Request $request, Project $project)
    {

        $project->update($request->all());
        return redirect('/');
    }
```

# Eliminar

```php
public function destroy(Project $project)
    {
        $project->delete();
        return redirect('/');
    }
```

# Relaciones

- Vamos a agregar un comentario a un proyecto.

```bash
php artisan make:model Comment -mf
```

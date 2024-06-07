<?php


// Singleton algorithm

class DB
{
    /**
     * @var null $connection
     */
    public static $connection = null;

    public static function connection()
    {
        if (is_null(self::$connection)) {
            self::$connection = mysqli_connect('localhost', 'root', '', 'lesson');
            if (self::$connection) {
                echo "Connected";
            }
        }
    }
}

class Model extends DB
{
    /**
     * @var string|null $table
     */

    public ?string $table = null;

    /**
     * @var array|null $fillable
     */
    public ?array $fillable = [];

    /**
     * Model constructors
     */
    public function __construct()
    {
        DB::connection();
    }

    /**
     * @param array $data
     * @return mysqli_result|bool
     */
    public function create(array $data): mysqli_result|bool
    {
        $columns = $values = "";

        foreach ($this->fillable as $item) {
            if (in_array($item, array_keys($data))) {
                $columns .= "`" . $item . "`,";
                $values .= "'" . htmlspecialchars($data[$item]) . "',";
            }
        }

        $columns = rtrim($columns, ',');
        $values = rtrim($values, ',');

        $sql = "INSERT INTO $this->table ($columns) VALUES ($values)";

        return mysqli_query(self::$connection, $sql);
    }
}

class User extends Model
{
    /**
     * @var string|null
     */
    public ?string $table = 'users';

    /**
     * @var array|string[]|null
     */
    public ?array $fillable = ['name', 'email', 'password'];
}

class Phone extends Model
{
    /**
     * @var string|null
     */
    public ?string $table = 'phones';

    /**
     * @var array|string[]|null
     */
    public ?array $fillable = ['user_id', 'phone'];
}

$user = new User();

$user->create([
    'name' => 'a',
    'email' => 'b',
    'password' => 'v'
]);

$phone = new Phone();

$phone->create([
    'user_id' => 1,
    'phone' => '99466633221'
]);
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

/**
 * @property int $id
 * @property string $nome
 * @property float $preco
 * @property string $descricao
 * @property \DateTime $created_at
 * @property \DateTime $updated_at
 */
class Produto extends Model
{
    use HasFactory;

    /**
     * Os atributos que podem ser preenchidos em massa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'preco',
        'descricao',
    ];

    /**
     * Os atributos que devem ser convertidos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'preco' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Regras de validação do produto.
     *
     * @return array<string, mixed>
     */
    public static function rules(): array
    {
        return [
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric|min:0',
            'descricao' => 'required|string',
        ];
    }

    /**
     * Formata o preço para exibição em Real brasileiro.
     */
    protected function precoFormatado(): Attribute
    {
        return Attribute::make(
            get: fn () => 'R$ ' . number_format($this->preco, 2, ',', '.')
        );
    }

    /**
     * Retorna um resumo da descrição.
     */
    protected function descricaoResumida(): Attribute
    {
        return Attribute::make(
            get: fn () => strlen($this->descricao) > 100 
                ? substr($this->descricao, 0, 97) . '...' 
                : $this->descricao
        );
    }
}

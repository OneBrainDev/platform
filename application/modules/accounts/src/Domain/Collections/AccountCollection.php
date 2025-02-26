<?php declare(strict_types=1);

namespace Platform\Accounts\Domain\Collections;

use Illuminate\Database\Eloquent\Collection;

/**
 * @template TKey of array-key
 * @template TModel of \Illuminate\Database\Eloquent\Model
 *
 * @extends \Illuminate\Database\Eloquent\Collection<TKey, TModel>
 */
class AccountCollection extends Collection {}

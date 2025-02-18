<?php declare(strict_types=1);


use Platform\Accounts\Domain\Models\Account;
use Platform\Accounts\Domain\Actions\SaveAccount;
use Platform\Accounts\Domain\ValueObjects\AccountObject;

test('it saves an account using the value object', function () {
    // Arrange
    $accountMock = mock(Account::class);
    $accountMock->expects('save')->once()->with(['name' => 'Test Account']);

    $action = new SaveAccount();
    $action->setModel($accountMock);

    $valueObject = AccountObject::from(['name' => 'Test Account']);

    // Act
    $action->handle($valueObject);

    // Assert
    // The assertion is handled by the mock expectations above
});

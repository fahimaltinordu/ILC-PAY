# ILC-PAY
This is a ILC-PAY script just need jquery and php to run. https://ilcointools.com/ilc-pay/

# procedure
The script will check wallet1 till wallet5 if there is an incoming TXID. This is necessary to find out which wallet address is "free" for next payment.
After the customer paid the invoice the wallet address is blocked till first confirmation.
The invoice creation and also payment are logged in "log.txt".

# Edit wallet.php

Change values of wallet variables in line 3 till line 7 to your ILC wallet addresses.

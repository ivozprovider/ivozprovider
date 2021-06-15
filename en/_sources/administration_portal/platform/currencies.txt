##########
Currencies
##########

This section allows adding as many currencies as wanted. It is a multilanguage field with a symbol that will be used
in invoices, balance movements, etc.

These IvozProvider elements have an assigned currency:

.. glossary::

    Brand
        Used as default currency for all underlying items that have currency.

    Client
        Chosen currency will be used in price calculation, invoices, invoice's fixed costs, balance movements and
        remaining money operations of this client.

    Carrier
        Chosen currency will be used in cost calculation, balance movements and
        remaining money operations of this carrier.

    Destination rate
        All rates within a destination rate will assume this currency.

    Rating plan
        All destination rates grouped in a rating plan **must** use this currency.


It is important to take into account notes below before using this feature:

- Rating plans **must** only group destination rates using its currency.

- Clients and carriers **must** only use rating plans using its currency.

.. note:: Some backend checks avoid some of previous misconfigurations, but not all of them: **use this feature carefully**.

.. important:: **There is no currency conversion involved**: call cost will be calculated in carrier's currency, call price
               will be calculated in client's currency.

.. caution:: LCR routes involving carriers with different currencies are not supported.
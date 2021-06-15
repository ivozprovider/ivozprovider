#####################
Concurrent call limit
#####################

This mechanism **limits the number of concurrent calls** of each client/brand.

.. note:: Both incoming external calls and outgoing external calls will be limited.

It can be configured at two levels:

- At Brand level with **Max calls** setting.

- At Client level with **Max calls** setting.

A brand clients' *Max calls* sum may be bigger than brand's *Max calls* value, there is no control to avoid this situation.

.. warning:: These counters are independent. Whenever one of this counter reaches its limit, call will be denied. This
               means that a call from a client that has not exceeded it own *Max call* setting may be denied if brand's
               limit has been exceeded.

.. tip:: To disable this mechanism, set its value to 0.
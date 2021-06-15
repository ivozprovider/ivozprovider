.. _retail_filters:

#####################
Retail DDI filters
#####################

Retail External Filters can be assigned to DDIs to temporary
forward calls to an external number.

Filters Configuration
=====================

This are the configurable settings of *Retail external filters*:

.. glossary::

    Name
        Name of the filter.

    Number
        External Destination for this filter.


.. attention:: Calls forwarded by a filter will keep the original
    caller identification, adding the forwarding info in a SIP
    *Diversion* header.

.. error:: Retail DDI filters have precedence over retail account call forward settings (as they apply before).
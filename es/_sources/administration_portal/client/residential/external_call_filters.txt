.. _residential_filters:

#####################
External call filters
#####################

Residential External Filters can be assigned to DDIs to temporary
forward calls to an external number or to avoid call from undesirable sources.

Filters Configuration
=====================

This are the configurable settings of *Residential external filters*:

.. glossary::

    Name
        Name of the filter.

    Black list
        External origin will be checked against the associated :ref:`match_lists`,
        if a coincidence is found, the call will be rejected immediately.

    Unconditional Call Forward
        Calls to DDIs using this filter will be forwarded to given external number.

.. tip:: Blacklisting has precedence over unconditional call forward. Calls from numbers
         matching associated matchlist won't be forwarded, they will be rejected.

.. attention:: Calls forwarded by a filter will keep the original
    caller identification, adding the forwarding info in a SIP
    *Diversion* header.

#####################
Generic Music on Hold
#####################

:ref:`Music on Hold` will be played when the user holds the call and the other
member waits until the call is resumed. 

If a vPBX client has defined a music on hold, it will be played. Otherwise, the
one defined by the brand administrator in this section. If none of this is configured,
a global music will be played.

Multiple files can be added to be played as Music on Hold. The system will choose them randomly for each call.

.. warning:: IvozProvider will play MOH only for vPBX and Residential clients. Remaining client
             types don't have MOH capabilities as their calls don't traverse any Application Server.

.. note:: Residential client listen the MOH defined by the brand operator in this section. If none is configured,
          a global music will be played.
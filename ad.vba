'INVOICE TABLE'
Sub RectangleRoundedCorners4_Click()
On Error GoTo EH
'NEW
Dim STR As String
Dim thissheet As Worksheet
Dim tableListObj As ListObject
Dim TABLE As ListObject
Dim tablerow As ListRow
Dim xTable As ListObject
'OLD
Dim FSO As Scripting.FileSystemObject
Dim FileToOpen As Variant
Dim des As String
Dim OpenBook As Workbook
Dim fldr As FileDialog
Dim fileExplorer As FileDialog
Dim ST As String
Set fileExplorer = Application.FileDialog(msoFileDialogFolderPicker)
Set FSO = New Scripting.FileSystemObject
Set thissheet = ThisWorkbook.Worksheets("Sheet1")
 
fileExplorer.AllowMultiSelect = False
FileToOpen = Application.GetOpenFilename(Title:="Browse for your File & Import Range", FileFilter:="Excel Files (*.xls*),*xls*")
Set thissheet = ThisWorkbook.Worksheets("filelist")
 Set tableListObj = thissheet.ListObjects("TABLE")
 If Not tableListObj.DataBodyRange Is Nothing Then
For I = 1 To tableListObj.DataBodyRange.Rows.Count
If tableListObj.DataBodyRange(I, 2).Value = FileToOpen Then
MsgBox ("Details of this file already exist")
Exit Sub
End If
Next I
End If
Set tablerow = tableListObj.ListRows.Add
thissheet.Range("C" & Rows.Count).End(xlUp).Value = FileToOpen
thissheet.Range("D" & Rows.Count).End(xlUp).Value = Format(Now, "mm/dd/yyyy HH:mm:ss")
Set thissheet = ThisWorkbook.Worksheets("sheet1")
Application.ScreenUpdating = False
If FileToOpen <> False Then 'A'
 Set OpenBook = Application.Workbooks.Open(FileToOpen)
 For I1 = 1 To OpenBook.Sheets(1).Cells.Find(What:="*", After:=[A1], SearchOrder:=xlByRows, SearchDirection:=xlPrevious).Row ''1
  O1 = OpenBook.Sheets(1).Range("A" & I1).Value
 For j = 1 To OpenBook.Sheets(1).Cells.Find(What:="*", After:=[A1], SearchOrder:=xlByRows, SearchDirection:=xlPrevious).Row '2''
 O2 = CStr(j)
 If O1 = O2 Then 'B'
 D = Replace(Replace(Replace(OpenBook.Sheets(1).Range("F2").Value, " ", "_"), "(", "_"), ")", "_")
 For Each TABLE In thissheet.ListObjects 'A'
 If D = TABLE.Name Then
 Set tableListObj = thissheet.ListObjects(D)
 U3 = 0
 If Not tableListObj.DataBodyRange Is Nothing Then '1'
 For P1 = 1 To tableListObj.DataBodyRange.Rows.Count 'A'
 STR = OpenBook.Sheets(1).Range("A" & I1).Offset(, 6).Value
 Do While Left(STR, 1) = "0"
    STR = Mid(STR, 2)
  Loop
 If STR = tableListObj.DataBodyRange(P1, 3).Value And OpenBook.Sheets(1).Range("A" & I1).Offset(, 5).Value = tableListObj.DataBodyRange(P1, 1).Value Then '2'
 V5 = tableListObj.DataBodyRange(P1, 2).Value
 If tableListObj.DataBodyRange(P1, 2).Value >= OpenBook.Sheets(1).Range("A" & I1).Offset(, 1).Value Then '3'
 U3 = 1
  End If
  U4 = 1
 End If
 Next P1
 End If
 If U4 = 0 Then
 MsgBox OpenBook.Sheets(1).Range("A" & I1).Offset(, 5).Value & "PRODUCT NOT FOUND IN MAIN GODOWN"
 End If
 If U3 = 1 Then ''U3
 Set tableListObj = thissheet.ListObjects("INVOICE")
 Set tablerow = tableListObj.ListRows.Add
 OpenBook.Sheets(1).Range("A" & I1).Offset(, 3).Copy
 thissheet.Range("E" & Rows.Count).End(xlUp).PasteSpecial xlPasteValues
 OpenBook.Sheets(1).Range("C5").Copy
 thissheet.Range("F" & Rows.Count).End(xlUp).PasteSpecial xlPasteValues 'f date'
 OpenBook.Sheets(1).Range("F2").Copy
 thissheet.Range("G" & Rows.Count).End(xlUp).PasteSpecial xlPasteValues 'g party name'
 OpenBook.Sheets(1).Range("A" & I1).Offset(, 5).Copy
 thissheet.Range("H" & Rows.Count).End(xlUp).PasteSpecial xlPasteValues ' h product'
 OpenBook.Sheets(1).Range("A" & I1).Offset(, 1).Copy
 thissheet.Range("I" & Rows.Count).End(xlUp).PasteSpecial xlPasteValues 'i qty'
 OpenBook.Sheets(1).Range("A" & I1).Offset(, 7).Copy
 thissheet.Range("K" & Rows.Count).End(xlUp).PasteSpecial xlPasteValues ' k exp date'
 thissheet.Range("J" & Rows.Count).End(xlUp).Value = STR
 K = Replace(Replace(Replace(thissheet.Range("G" & Rows.Count).End(xlUp).Value, " ", "_"), "(", "_"), ")", "_")
thissheet.Range("K" & Rows.Count).End(xlUp).FormulaR1C1 = thissheet.Range("K" & Rows.Count).End(xlUp).Value
thissheet.Range("L" & Rows.Count).End(xlUp).Value = (thissheet.Range("K" & Rows.Count).End(xlUp).Value - thissheet.Range("M3").Value) 'EXPIRY DAYS'
QTY = thissheet.Range("I" & Rows.Count).End(xlUp).Value
v = 0
 'ADD TO SUB GODOWN DELETING FROM MAIN GODOWN'
 
  Set tableListObj = thissheet.ListObjects("GODOWN")
 If Not tableListObj.DataBodyRange Is Nothing Then '1'
 For P = 1 To tableListObj.DataBodyRange.Rows.Count 'A'
 If STR = tableListObj.DataBodyRange(P, 3).Value And thissheet.Range("H" & Rows.Count).End(xlUp).Value = tableListObj.DataBodyRange(P, 1).Value Then '2'
 If tableListObj.DataBodyRange(P, 2).Value >= QTY Then '3'
 v = 1
 End If '3'
 End If '2'
 Next P 'A'
 End If '1'
 If v = 1 Then 'V'
 For Each xTable In thissheet.ListObjects 'A'
 If K = xTable.Name Then '1'
 N = xTable.Name
 U = 1
 End If 'A'
 Next xTable '1'
 If U = 0 Then 'U'
' OpenBook.Close
' On Error Resume Next
' lCol = thissheet.Cells.Find(What:="*", After:=[A1], SearchOrder:=xlByColumns, SearchDirection:=xlPrevious).Column
'    b = lCol + 2
'    l = lCol + 5
'    Set Rng = Range(Cells(4, b), Cells(4, l))
'    N1 = K
'    'TO ADD A NEW TABLE
'    ThisWorkbook.Worksheets("Sheet1").ListObjects.Add(xlSrcRange, Rng, , xlYes).Name = N1
'    'Find the last non-blank cell in column A(1)
'    'Find the last non-blank cell in row 1
'    ThisWorkbook.Worksheets("Sheet1").Range(Cells(2, b), Cells(2, l)).Merge
'    ThisWorkbook.Worksheets("Sheet1").Range(Cells(2, b), Cells(2, l)).Value = N1
' ThisWorkbook.Worksheets("Sheet1").Range(Cells(4, b), Cells(4, l)).Value = Split("PRODUCT QUANTITY BATCH EXPIRED ")
' Set NEWListObj = thissheet.ListObjects(N1)
' Set NEWtablerow = NEWListObj.ListRows.Add
' With NEWtablerow
' .Range(1) = thissheet.Range("H" & Rows.Count).End(xlUp).Value
' .Range(2) = thissheet.Range("I" & Rows.Count).End(xlUp).Value
' .Range(3) = STR
' .Range(4) = thissheet.Range("K" & Rows.Count).End(xlUp).Value
' .Range(5) = thissheet.Range("E" & Rows.Count).End(xlUp).Value
' End With
' U1 = 1
 Else
 Set tableListObj = thissheet.ListObjects(K)
 If Not tableListObj.DataBodyRange Is Nothing Then '1'
 For P = 1 To tableListObj.DataBodyRange.Rows.Count 'A'
 If STR = tableListObj.DataBodyRange(P, 3).Value And thissheet.Range("H" & Rows.Count).End(xlUp).Value = tableListObj.DataBodyRange(P, 1).Value Then '2'
 If tableListObj.DataBodyRange(P, 2) >= QTY Then
 MsgBox "CURRENT STOCK UPDATED SUCCESFULLY IN SUB GD" & vbNewLine & K
 tableListObj.DataBodyRange(P, 2).Value = tableListObj.DataBodyRange(P, 2).Value - QTY
 U1 = 1
 Else
 End If
 End If '2'
 Next P 'A'
 End If '1'
' If U1 = 0 Then ''U1
' MsgBox "NEW STOCK SUCCESFULLY ADDED TO SUB GODOWN " & K
' Set NEWListObj = thissheet.ListObjects(K)
' Set NEWtablerow = NEWListObj.ListRows.Add
' With NEWtablerow
' .Range(1) = thissheet.Range("H" & Rows.Count).End(xlUp).Value
' .Range(2) = thissheet.Range("I" & Rows.Count).End(xlUp).Value
' .Range(3) = STR
' .Range(4) = thissheet.Range("K" & Rows.Count).End(xlUp).Value
' .Range(5) = thissheet.Range("E" & Rows.Count).End(xlUp).Value
' End With
' End If 'U1'
 End If 'U'
 End If ''V
 Else
 MsgBox OpenBook.Sheets(1).Range("A" & I1).Offset(, 5).Value & vbNewLine & "   OUT OF STOCK  SUB GODOWN "
 
 End If '' U3
 '' DELETING FROM MAIN GODOWN'
 U1 = 1
 End If
 Next TABLE
 If U1 = 0 Then
 MsgBox "SUB GODOWN NOT FOUND " & vbNewLine & D
 End If
 End If
 Next j
 Next I1
 OpenBook.Close
 For Each xTable In thissheet.ListObjects
    AStr = AStr & "," & xTable.Name
Next xTable
 With ThisWorkbook.Worksheets("Sheet1").Range("B7").Validation
    .Delete
    .Add Type:=xlValidateList, AlertStyle:=xlValidAlertStop, Operator:= _
    xlBetween, Formula1:=AStr
    .IgnoreBlank = True
    .InCellDropdown = True
    .InputTitle = ""
    .ErrorTitle = ""
    .InputMessage = ""
    .ErrorMessage = ""
    .ShowInput = True
    .ShowError = True
    
End With
 End If
 Set tableListObj = thissheet.ListObjects("GODOWN")
 thissheet.Range("L" & Rows.Count).End(xlUp).Value = FileToOpen 'l file name'
 ThisWorkbook.Worksheets("Sheet1").Range("A1:ZZ1000000").Columns.AutoFit
  ThisWorkbook.Worksheets("filelist").Range("A1:E1000000").Columns.AutoFit
 ''For Each xTable In thissheet.ListObjects
  ''N = xTable.Name
  ''Set tableListObj = thissheet.ListObjects(N)
  ''For P = 1 To tableListObj.DataBodyRange.Rows.Count
  ''For I = 1 To tableListObj.DataBodyRange.Rows.Count
 
 ''Next xTable
 Application.ScreenUpdating = True
done:
 Exit Sub
EH:
   MsgBox Err.Description
End Sub
 'END OF INVOICE'
'PURCHASE'
Sub RectangleRoundedCorners32_Click()
On Error GoTo EH
'NEW
Dim thissheet As Worksheet
Dim tableListObj As ListObject
Dim tablerow As ListRow
Dim STR As String
'OLD
Dim FSO As Scripting.FileSystemObject
Dim FileToOpen As Variant
Dim des As String
Dim OpenBook As Workbook
Dim fldr As FileDialog
Dim fileExplorer As FileDialog
Dim ST As String
Set fileExplorer = Application.FileDialog(msoFileDialogFolderPicker)
Set FSO = New Scripting.FileSystemObject
fileExplorer.AllowMultiSelect = False
I1 = 0
FileToOpen = Application.GetOpenFilename(Title:="Browse for your File & Import Range", FileFilter:="Excel Files (*.xls*),*xls*")
Set thissheet = ThisWorkbook.Worksheets("filelist")
 Set tableListObj = thissheet.ListObjects("TABLE")
 If Not tableListObj.DataBodyRange Is Nothing Then
For I = 1 To tableListObj.DataBodyRange.Rows.Count
If tableListObj.DataBodyRange(I, 2).Value = FileToOpen Then
MsgBox ("Details of this file already exist")
Exit Sub
End If
Next I
End If
Set tablerow = tableListObj.ListRows.Add
thissheet.Range("C" & Rows.Count).End(xlUp).Value = FileToOpen
thissheet.Range("D" & Rows.Count).End(xlUp).Value = Format(Now, "mm/dd/yyyy HH:mm:ss")
Application.ScreenUpdating = False

If FileToOpen <> False Then
 Set OpenBook = Application.Workbooks.Open(FileToOpen)
 For I = 1 To OpenBook.Sheets(1).Cells.Find(What:="*", After:=[A1], SearchOrder:=xlByRows, SearchDirection:=xlPrevious).Row
 O1 = OpenBook.Sheets(1).Range("A" & I).Value
 For j = 1 To OpenBook.Sheets(1).Cells.Find(What:="*", After:=[A1], SearchOrder:=xlByRows, SearchDirection:=xlPrevious).Row
 If O1 = j Then
  STR = OpenBook.Sheets(1).Range("A" & I).Offset(1, 3).Value
 Do While Left(STR, 1) = "0"
    STR = Mid(STR, 2)
  Loop
 Set thissheet = ThisWorkbook.Worksheets("Sheet1")
 Set tableListObj = thissheet.ListObjects("PURCHASE")
 Set tablerow = tableListObj.ListRows.Add
 OpenBook.Sheets(1).Range("A3").Copy
 thissheet.Range("R" & Rows.Count).End(xlUp).PasteSpecial xlPasteValues 'COMPANY'
 OpenBook.Sheets(1).Range("M4").Copy
 thissheet.Range("S" & Rows.Count).End(xlUp).PasteSpecial xlPasteValues 'f date'
 OpenBook.Sheets(1).Range("A8").Copy
 thissheet.Range("T" & Rows.Count).End(xlUp).PasteSpecial xlPasteValues 'g party name'
 OpenBook.Sheets(1).Range("A" & I).Offset(, 2).Copy
 thissheet.Range("U" & Rows.Count).End(xlUp).PasteSpecial xlPasteValues ' h product'
 OpenBook.Sheets(1).Range("A" & I).Offset(, 11).Copy
 thissheet.Range("V" & Rows.Count).End(xlUp).PasteSpecial xlPasteValues 'i qty'
  OpenBook.Sheets(1).Range("A" & I).Offset(2, 3).Copy
 thissheet.Range("X" & Rows.Count).End(xlUp).PasteSpecial xlPasteValues ' k exp date'
 OpenBook.Sheets(1).Range("A" & I).Offset(1, 3).Copy
 thissheet.Range("W" & Rows.Count).End(xlUp).Value = STR 'j batch'
 thissheet.Range("X" & Rows.Count).End(xlUp).FormulaR1C1 = thissheet.Range("X" & Rows.Count).End(xlUp).Value
thissheet.Range("Y" & Rows.Count).End(xlUp).Value = (thissheet.Range("X" & Rows.Count).End(xlUp).Value - thissheet.Range("M3").Value) 'EXPIRY DAYS'
Set tableListObj = thissheet.ListObjects("GODOWN")
 Set tablerow = tableListObj.ListRows.Add
 With tablerow
 .Range(1) = thissheet.Range("U" & Rows.Count).End(xlUp).Value
 .Range(2) = thissheet.Range("V" & Rows.Count).End(xlUp).Value
 .Range(3) = STR
 .Range(4) = thissheet.Range("Z" & Rows.Count).End(xlUp).Value
 .Range(5) = thissheet.Range("R" & Rows.Count).End(xlUp).Value
 End With
 End If
 Next j
 Next I
 OpenBook.Close
 For Each xTable In thissheet.ListObjects
    AStr = AStr & "," & xTable.Name
Next xTable
 With ThisWorkbook.Worksheets("Sheet1").Range("B7").Validation
    .Delete
    .Add Type:=xlValidateList, AlertStyle:=xlValidAlertStop, Operator:= _
    xlBetween, Formula1:=AStr
    .IgnoreBlank = True
    .InCellDropdown = True
    .InputTitle = ""
    .ErrorTitle = ""
    .InputMessage = ""
    .ErrorMessage = ""
    .ShowInput = True
    .ShowError = True
    
End With
 End If

 For P = 1 To tableListObj.DataBodyRange.Rows.Count
 For I = 1 To tableListObj.DataBodyRange.Rows.Count
 If P <> I Then
If tableListObj.DataBodyRange(P, 1).Value = tableListObj.DataBodyRange(I, 1).Value And tableListObj.DataBodyRange(P, 3).Value = tableListObj.DataBodyRange(I, 3).Value Then
 tableListObj.DataBodyRange(P, 2).Value = tableListObj.DataBodyRange(P, 2).Value + tableListObj.DataBodyRange(I, 2).Value
 tableListObj.ListRows(I).Delete
 End If
 End If
 Next I
 Next P
  ThisWorkbook.Worksheets("Sheet1").Range("A1:ZZ1000000").Columns.AutoFit
   ThisWorkbook.Worksheets("filelist").Range("A1:E1000000").Columns.AutoFit
 Application.ScreenUpdating = True
done:
 Exit Sub
EH:
   MsgBox Err.Description
End Sub
'END OF PURCHASE'
'MATERIAL IN'
Sub RectangleRoundedCorners33_Click()
On Error GoTo EH
'NEW
Dim thissheet As Worksheet
Dim tableListObj As ListObject
Dim tablerow As ListRow
Dim STR As String
'OLD
Dim FSO As Scripting.FileSystemObject
Dim FileToOpen As Variant
Dim des As String
Dim OpenBook As Workbook
Dim fldr As FileDialog
Dim fileExplorer As FileDialog
Dim ST As String
Set fileExplorer = Application.FileDialog(msoFileDialogFolderPicker)
Set FSO = New Scripting.FileSystemObject
fileExplorer.AllowMultiSelect = False
FileToOpen = Application.GetOpenFilename(Title:="Browse for your File & Import Range", FileFilter:="Excel Files (*.xls*),*xls*")
Set thissheet = ThisWorkbook.Worksheets("filelist")
 Set tableListObj = thissheet.ListObjects("TABLE")
 If Not tableListObj.DataBodyRange Is Nothing Then
For I = 1 To tableListObj.DataBodyRange.Rows.Count
If tableListObj.DataBodyRange(I, 2).Value = FileToOpen Then
MsgBox ("Details of this file already exist")
Exit Sub
End If
Next I
End If
Set tablerow = tableListObj.ListRows.Add
thissheet.Range("C" & Rows.Count).End(xlUp).Value = FileToOpen
thissheet.Range("D" & Rows.Count).End(xlUp).Value = Format(Now, "mm/dd/yyyy HH:mm:ss")
Application.ScreenUpdating = False
If FileToOpen <> False Then '1'
 Set OpenBook = Application.Workbooks.Open(FileToOpen)
 For I = 1 To OpenBook.Sheets(1).Cells.Find(What:="*", After:=[A1], SearchOrder:=xlByRows, SearchDirection:=xlPrevious).Row 'A'
 O1 = OpenBook.Sheets(1).Range("A" & I).Value
 For j = 1 To OpenBook.Sheets(1).Cells.Find(What:="*", After:=[A1], SearchOrder:=xlByRows, SearchDirection:=xlPrevious).Row 'B'
 If O1 = j Then
  STR = OpenBook.Sheets(1).Range("A" & I).Offset(1, 2).Value
 Do While Left(STR, 1) = "0"
    STR = Mid(STR, 2)
  Loop
 Set thissheet = ThisWorkbook.Worksheets("Sheet1")
 For Each xTable In thissheet.ListObjects 'C'
 K = Replace(Replace(Replace(OpenBook.Sheets(1).Range("A1:N100").Find(What:="Party").Offset(1).Value, " ", "_"), "(", "_"), ")", "_")
 If K = xTable.Name Then '3'
 Set tableListObj = thissheet.ListObjects(K)
 If Not tableListObj.DataBodyRange Is Nothing Then '4'
 For P2 = 1 To tableListObj.DataBodyRange.Rows.Count 'D'
 If OpenBook.Sheets(1).Range("A" & I).Offset(1, 2).Value = tableListObj.DataBodyRange(P2, 3).Value And OpenBook.Sheets(1).Range("A" & I).Offset(, 1).Value = tableListObj.DataBodyRange(P2, 1).Value Then '5'
 If tableListObj.DataBodyRange(P2, 2).Value >= OpenBook.Sheets(1).Range("A" & I).Offset(, 10).Value Then '6'
 Set thissheet = ThisWorkbook.Worksheets("Sheet1")
 Set tableListObj = thissheet.ListObjects("materialin")
 Set tablerow = tableListObj.ListRows.Add
 OpenBook.Sheets(1).Range("A1:N100").Find(What:="Voucher No.").Offset(1, 1).Copy
 thissheet.Range("AF" & Rows.Count).End(xlUp).PasteSpecial xlPasteValues 'f date'
 OpenBook.Sheets(1).Range("A1:N100").Find(What:="Party").Offset(1).Copy
 thissheet.Range("AG" & Rows.Count).End(xlUp).PasteSpecial xlPasteValues 'g party name'
 OpenBook.Sheets(1).Range("A" & I).Offset(, 1).Copy
 thissheet.Range("AH" & Rows.Count).End(xlUp).PasteSpecial xlPasteValues ' h product'
 OpenBook.Sheets(1).Range("A" & I).Offset(, 10).Copy
 thissheet.Range("AI" & Rows.Count).End(xlUp).PasteSpecial xlPasteValues 'i qty'
 OpenBook.Sheets(1).Range("A" & I).Offset(2, 2).Copy
 thissheet.Range("AK" & Rows.Count).End(xlUp).PasteSpecial xlPasteValues ' k exp date'
 thissheet.Range("AJ" & Rows.Count).End(xlUp).Value = STR 'j batch'
 thissheet.Range("AK" & Rows.Count).End(xlUp).FormulaR1C1 = thissheet.Range("AK" & Rows.Count).End(xlUp).Value
thissheet.Range("AL" & Rows.Count).End(xlUp).Value = (thissheet.Range("AK" & Rows.Count).End(xlUp).Value - thissheet.Range("M3").Value) 'EXPIRY DAYS'
 'ADD TO MAIN GODOWN DELETING FROM SUB GODOWN '
  ' batch'
K1 = Replace(Replace(Replace(thissheet.Range("AG" & Rows.Count).End(xlUp).Value, " ", "_"), "(", "_"), ")", "_") ' party name'
K2 = thissheet.Range("AH" & Rows.Count).End(xlUp).Value ' product'
K3 = thissheet.Range("AI" & Rows.Count).End(xlUp).Value ' qty'
v = 0
v1 = 0
V3 = 0
 For Each TABLE In thissheet.ListObjects 'E'
 If K = TABLE.Name Then '10'
 N = TABLE.Name
 Set tableListObj = thissheet.ListObjects(N)
 If Not tableListObj.DataBodyRange Is Nothing Then '11'
 For P1 = 1 To tableListObj.DataBodyRange.Rows.Count 'F'
 If STR = tableListObj.DataBodyRange(P1, 3).Value And K2 = tableListObj.DataBodyRange(P1, 1).Value Then  '12'
 If tableListObj.DataBodyRange(P1, 2).Value >= K3 Then
 tableListObj.DataBodyRange(P1, 2).Value = tableListObj.DataBodyRange(P1, 2).Value - K3
 v = 1
 End If
 End If '12'
 Next P1 'F'
 End If '11'
 End If '10'
 Next TABLE 'É'
 If v = 1 Then '9'
 Set tableListObj = thissheet.ListObjects("GODOWN")
 If Not tableListObj.DataBodyRange Is Nothing Then '6'
 For P = 1 To tableListObj.DataBodyRange.Rows.Count 'D'
 If STR = tableListObj.DataBodyRange(P, 3).Value And K2 = tableListObj.DataBodyRange(P, 1).Value Then '7'
 tableListObj.DataBodyRange(P, 2).Value = tableListObj.DataBodyRange(P, 2).Value + K3
 v1 = 1
 End If '7 GD PRODUCT CHECK'
 Next P 'D'
 End If ' 6 GD EMPTY OR NOT
 End If '9'
 If v1 = 0 Then '13'
  Set tableListObj = thissheet.ListObjects("GODOWN")
 Set tablerow = tableListObj.ListRows.Add
 With tablerow
 .Range(1) = K2
 .Range(2) = K3
 .Range(3) = STR
 .Range(4) = thissheet.Range("AZ" & Rows.Count).End(xlUp).Value
 End With
 v = 0
 v1 = 0
 End If '13'
 V3 = 1
 'END CHECKING WHETHER PRODUCT IN SUB GD'
    End If '6'
    V2 = 1
    End If '5'
    Next P2 'D'
    End If '4'
    V5 = 1
    End If '3'
    Next xTable 'C'
 If V5 = 0 Then
 MsgBox " SUB GODOWN " & K & vbNewLine & " NOT FOUND"
 End If
 If V2 = 0 And V5 = 1 Then
MsgBox K2 & "NO SUCH PRODUCT FOUND IN SUB GODOWN " & vbNewLine & K
 End If
 If V3 = 0 And V2 = 1 Then '14'
 MsgBox "REQUIRED PRODUCT :" & OpenBook.Sheets(1).Range("A" & I).Offset(, 1).Value & vbNewLine & "  STOCK REQUIRED:  " & OpenBook.Sheets(1).Range("A" & I).Offset(, 10).Value & "  STOCK IN SUB GODOWN : " & V4 & vbNewLine & "                 INSUFFICENT STOCK"
 End If '14'
 End If '2'
 Next j 'B'
 Next I 'A'
 OpenBook.Close
 For Each xTable In thissheet.ListObjects
    AStr = AStr & "," & xTable.Name
Next xTable
 With ThisWorkbook.Worksheets("Sheet1").Range("B7").Validation
    .Delete
    .Add Type:=xlValidateList, AlertStyle:=xlValidAlertStop, Operator:= _
    xlBetween, Formula1:=AStr
    .IgnoreBlank = True
    .InCellDropdown = True
    .InputTitle = ""
    .ErrorTitle = ""
    .InputMessage = ""
    .ErrorMessage = ""
    .ShowInput = True
    .ShowError = True
    
End With
 End If '1'
 ThisWorkbook.Worksheets("Sheet1").Range("A1:ZZ1000000").Columns.AutoFit
  ThisWorkbook.Worksheets("filelist").Range("A1:E1000000").Columns.AutoFit
 Application.ScreenUpdating = True
done:
 Exit Sub
EH:
   MsgBox Err.Description
End Sub
'END OF MATERIAL  IN'
' MATERIAL  OUT'
Sub RectangleRoundedCorners34_Click()
On Error GoTo EH
'NEW
Dim tableList As ListObject
Dim STR As String
    Dim TblRng As Range
Dim thissheet As Worksheet
Dim tableListObj As ListObject
Dim tablerow As ListRow
Dim lRow As Long
Dim lCol As Long
Dim xTable As ListObject
    Dim xSheet As Worksheet
'OLD
Dim FSO As Scripting.FileSystemObject
Dim FileToOpen As Variant
Dim des As String
Dim OpenBook As Workbook
Dim fldr As FileDialog
Dim fileExplorer As FileDialog
Dim ST As String
Dim N As String
Set fileExplorer = Application.FileDialog(msoFileDialogFolderPicker)
Set FSO = New Scripting.FileSystemObject
fileExplorer.AllowMultiSelect = False
FileToOpen = Application.GetOpenFilename(Title:="Browse for your File & Import Range", FileFilter:="Excel Files (*.xls*),*xls*")
Set thissheet = ThisWorkbook.Worksheets("filelist")
 Set tableListObj = thissheet.ListObjects("TABLE")
 If Not tableListObj.DataBodyRange Is Nothing Then
For I = 1 To tableListObj.DataBodyRange.Rows.Count
If tableListObj.DataBodyRange(I, 2).Value = FileToOpen Then
MsgBox ("Details of this file already exist")
Exit Sub
End If
Next I
End If
Set tablerow = tableListObj.ListRows.Add
thissheet.Range("C" & Rows.Count).End(xlUp).Value = FileToOpen
thissheet.Range("D" & Rows.Count).End(xlUp).Value = Format(Now, "mm/dd/yyyy HH:mm:ss")
v = 0
Application.ScreenUpdating = False
If FileToOpen <> False Then ''1
 Set OpenBook = Application.Workbooks.Open(FileToOpen)
 For I = 1 To OpenBook.Sheets(1).Cells.Find(What:="*", After:=[A1], SearchOrder:=xlByRows, SearchDirection:=xlPrevious).Row 'A'
 O1 = OpenBook.Sheets(1).Range("A" & I).Value
 For j = 1 To OpenBook.Sheets(1).Cells.Find(What:="*", After:=[A1], SearchOrder:=xlByRows, SearchDirection:=xlPrevious).Row 'B'
 If O1 = j Then
 Set thissheet = ThisWorkbook.Worksheets("Sheet1")
 Set tableListObj = thissheet.ListObjects("GODOWN")
 ''If Not tableListObj.DataBodyRange Is Nothing Then '1'
  U3 = 0
 If Not tableListObj.DataBodyRange Is Nothing Then '1'
 For P1 = 1 To tableListObj.DataBodyRange.Rows.Count 'A'
 STR = OpenBook.Sheets(1).Range("A" & I).Offset(1, 2).Value
 Do While Left(STR, 1) = "0"
    STR = Mid(STR, 2)
  Loop
 If STR = tableListObj.DataBodyRange(P1, 3).Value And OpenBook.Sheets(1).Range("A" & I).Offset(, 1).Value = tableListObj.DataBodyRange(P1, 1).Value Then '2'
 If tableListObj.DataBodyRange(P1, 2).Value >= OpenBook.Sheets(1).Range("A" & I).Offset(, 10).Value Then '3'
 U3 = 1
  End If
 End If
 Next P1
 End If
 If U3 = 1 Then
 ''For P1 = 1 To tableListObj.DataBodyRange.Rows.Count 'A'
 ''If OpenBook.Sheets(1).Range("A" & I).Offset(1, 2).Value = tableListObj.DataBodyRange(P1, 3).Value And OpenBook.Sheets(1).Range("A" & I).Offset(, 1).Value = tableListObj.DataBodyRange(P1, 1).Value Then '2'
 ''If tableListObj.DataBodyRange(P1, 2).Value >= OpenBook.Sheets(1).Range("A" & I).Offset(, 10).Value Then '3'
 Set tableListObj = thissheet.ListObjects("MATERIALOUT")
 Set tablerow = tableListObj.ListRows.Add
 OpenBook.Sheets(1).Range("J4").Copy
 thissheet.Range("AS" & Rows.Count).End(xlUp).PasteSpecial xlPasteValues ' date'
 OpenBook.Sheets(1).Range("A9").Copy
 thissheet.Range("AT" & Rows.Count).End(xlUp).PasteSpecial xlPasteValues ' party name'
 OpenBook.Sheets(1).Range("A" & I).Offset(, 1).Copy
 thissheet.Range("AU" & Rows.Count).End(xlUp).PasteSpecial xlPasteValues ' product'
 OpenBook.Sheets(1).Range("A" & I).Offset(, 10).Copy
 thissheet.Range("AV" & Rows.Count).End(xlUp).PasteSpecial xlPasteValues ' qty'
 OpenBook.Sheets(1).Range("A" & I).Offset(2, 2).Copy
 thissheet.Range("AX" & Rows.Count).End(xlUp).PasteSpecial xlPasteValues '  exp date'
 thissheet.Range("AW" & Rows.Count).End(xlUp).Value = STR ' batch'
 thissheet.Range("AX" & Rows.Count).End(xlUp).FormulaR1C1 = thissheet.Range("AX" & Rows.Count).End(xlUp).Value
thissheet.Range("AY" & Rows.Count).End(xlUp).Value = (thissheet.Range("AX" & Rows.Count).End(xlUp).Value - thissheet.Range("M3").Value) 'EXPIRY DAYS'
 ' batch'
 COMPANY = OpenBook.Sheets(1).Range("A3").Value
K1 = Replace(Replace(Replace(thissheet.Range("AT" & Rows.Count).End(xlUp).Value, " ", "_"), "(", "_"), ")", "_") ' party name'
K2 = thissheet.Range("AU" & Rows.Count).End(xlUp).Value ' product'
K3 = thissheet.Range("AV" & Rows.Count).End(xlUp).Value ' qty'
K4 = thissheet.Range("AZ" & Rows.Count).End(xlUp).Value
v = 0
v1 = 0
V3 = 0
v = 0
 'ADD TO SUB GODOWN DELETING FROM MAIN GODOWN'
  Set tableListObj = thissheet.ListObjects("GODOWN")
 If Not tableListObj.DataBodyRange Is Nothing Then '1'
 For P = 1 To tableListObj.DataBodyRange.Rows.Count 'A'
 If STR = tableListObj.DataBodyRange(P, 3).Value And K2 = tableListObj.DataBodyRange(P, 1).Value Then '2'
 If tableListObj.DataBodyRange(P, 2).Value >= K3 Then '3'
 tableListObj.DataBodyRange(P, 2).Value = tableListObj.DataBodyRange(P, 2).Value - K3
 v = 1
 End If
 End If
 Next P
 End If
 If v = 1 Then
 For Each xTable In thissheet.ListObjects
 If K1 = xTable.Name Then
 N = xTable.Name
 U = 1
 End If
 Next xTable
 If U = 0 Then
 OpenBook.Close
 On Error Resume Next
 lCol = thissheet.Cells.Find(What:="*", After:=[A1], SearchOrder:=xlByColumns, SearchDirection:=xlPrevious).Column
    b = lCol + 3
    l = lCol + 7
    Set Rng = Range(Cells(7, b), Cells(7, l))
    
    N1 = K1
    'TO ADD A NEW TABLE
    ThisWorkbook.Worksheets("Sheet1").ListObjects.Add(xlSrcRange, Rng, , xlYes).Name = N1
    'Find the last non-blank cell in column A(1)
    'Find the last non-blank cell in row 1
    ThisWorkbook.Worksheets("Sheet1").Range(Cells(4, b), Cells(4, l)).Merge
    ThisWorkbook.Worksheets("Sheet1").Range(Cells(4, b), Cells(4, l)).Value = N1
    ThisWorkbook.Worksheets("Sheet1").Range(Cells(4, b), Cells(4, l)).Font.Size = 18
    ThisWorkbook.Worksheets("Sheet1").Range(Cells(4, b), Cells(4, l)).Font.Color = vbWhite
   ThisWorkbook.Worksheets("Sheet1").Range(Cells(4, b), Cells(4, l)).HorizontalAlignment = xlCenter
   ThisWorkbook.Worksheets("Sheet1").Range(Cells(4, b), Cells(4, l)).VerticalAlignment = xlCenter
   With ThisWorkbook.Worksheets("Sheet1").Range(Cells(4, b), Cells(4, l)).Interior
        .Pattern = xlSolid
        .PatternColorIndex = xlAutomatic
        .ThemeColor = xlThemeColorAccent1
        .TintAndShade = 0.399975585192419
        .PatternTintAndShade = 0
    End With
 ThisWorkbook.Worksheets("Sheet1").Range(Cells(7, b), Cells(7, l)).Value = Split("PRODUCT QUANTITY BATCH EXPIRY COMPANY")
 Set NEWListObj = thissheet.ListObjects(N1)
 Set NEWtablerow = NEWListObj.ListRows.Add
 With NEWtablerow
 .Range(1) = K2
 .Range(2) = K3
 .Range(3) = STR
 .Range(4) = thissheet.Range("AX" & Rows.Count).End(xlUp).Value
 End With
 Else
 Set tableListObj = thissheet.ListObjects(K1)
 If Not tableListObj.DataBodyRange Is Nothing Then '1'
 For P = 1 To tableListObj.DataBodyRange.Rows.Count 'A'
 If STR = tableListObj.DataBodyRange(P, 3).Value And K2 = tableListObj.DataBodyRange(P, 1).Value Then '2'
 MsgBox " CURRENT STOCK UPDATED  SUCCESFULLY IN SUB GODOWN " & K1
 tableListObj.DataBodyRange(P, 2).Value = tableListObj.DataBodyRange(P, 2).Value + K3
 U1 = 1
 End If
 Next P
 End If
 If U1 = 0 Then
 MsgBox "NEW STOCK SUCCESFULLY ADDED TO SUB GODOWN" & K1
 Set NEWListObj = thissheet.ListObjects(K1)
 Set NEWtablerow = NEWListObj.ListRows.Add
 With NEWtablerow
 .Range(1) = K2
 .Range(2) = K3
 .Range(3) = STR
 .Range(4) = thissheet.Range("AX" & Rows.Count).End(xlUp).Value
 .Range(5) = COMPANY
 End With
 End If
 End If
 End If
  T = 1
  ''End If
 ''End If
 ''Next P1
 Else
 MsgBox OpenBook.Sheets(1).Range("A" & I).Offset(, 1).Value & vbNewLine & "  OUT OF STOCK IN  MAIN GODOWN"
 End If
 End If ''2
 Next j ''B
 Next I ''A
 OpenBook.Close
 For Each xTable In thissheet.ListObjects
    AStr = AStr & "," & xTable.Name
Next xTable
 With ThisWorkbook.Worksheets("Sheet1").Range("B7").Validation
    .Delete
    .Add Type:=xlValidateList, AlertStyle:=xlValidAlertStop, Operator:= _
    xlBetween, Formula1:=AStr
    .IgnoreBlank = True
    .InCellDropdown = True
    .InputTitle = ""
    .ErrorTitle = ""
    .InputMessage = ""
    .ErrorMessage = ""
    .ShowInput = True
    .ShowError = True
    
End With
 End If ''1
  ThisWorkbook.Worksheets("Sheet1").Range("A1:ZZ1000000").Columns.AutoFit
   ThisWorkbook.Worksheets("filelist").Range("A1:E1000000").Columns.AutoFit
 Application.ScreenUpdating = True
done:
 Exit Sub
EH:
   MsgBox Err.Description
End Sub
'END OF MATERIAL  OUT'
Sub RectangleRoundedCorners36_Click()
With ThisWorkbook.Worksheets("Sheet1").ListObjects("INVOICE")
        If Not ThisWorkbook.Worksheets("Sheet1").ListObjects("INVOICE").DataBodyRange Is Nothing Then
            ThisWorkbook.Worksheets("Sheet1").ListObjects("INVOICE").DataBodyRange.ClearContents
            ThisWorkbook.Worksheets("Sheet1").ListObjects("INVOICE").DataBodyRange.Delete
        End If
    
    End With
End Sub
Sub RectangleRoundedCorners37_Click()
With ThisWorkbook.Worksheets("Sheet1").ListObjects("PURCHASE")
        If Not ThisWorkbook.Worksheets("Sheet1").ListObjects("PURCHASE").DataBodyRange Is Nothing Then
            ThisWorkbook.Worksheets("Sheet1").ListObjects("PURCHASE").DataBodyRange.ClearContents
            ThisWorkbook.Worksheets("Sheet1").ListObjects("PURCHASE").DataBodyRange.Delete
        End If
    
    End With
End Sub
Sub RectangleRoundedCorners38_Click()
With ThisWorkbook.Worksheets("Sheet1").ListObjects("materialin")
        If Not ThisWorkbook.Worksheets("Sheet1").ListObjects("materialin").DataBodyRange Is Nothing Then
            ThisWorkbook.Worksheets("Sheet1").ListObjects("materialin").DataBodyRange.ClearContents
            ThisWorkbook.Worksheets("Sheet1").ListObjects("materialin").DataBodyRange.Delete
        End If
    
    End With
End Sub
Sub RectangleRoundedCorners39_Click()
With ThisWorkbook.Worksheets("Sheet1").ListObjects("MATERIALOUT")
        If Not ThisWorkbook.Worksheets("Sheet1").ListObjects("MATERIALOUT").DataBodyRange Is Nothing Then
            ThisWorkbook.Worksheets("Sheet1").ListObjects("MATERIALOUT").DataBodyRange.ClearContents
            ThisWorkbook.Worksheets("Sheet1").ListObjects("MATERIALOUT").DataBodyRange.Delete
        End If
    
    End With
End Sub
Sub RectangleRoundedCorners40_Click()
With ThisWorkbook.Worksheets("Sheet1").ListObjects("GODOWN")
        If Not ThisWorkbook.Worksheets("Sheet1").ListObjects("GODOWN").DataBodyRange Is Nothing Then
            ThisWorkbook.Worksheets("Sheet1").ListObjects("GODOWN").DataBodyRange.ClearContents
            ThisWorkbook.Worksheets("Sheet1").ListObjects("GODOWN").DataBodyRange.Delete
        End If
    
    End With
End Sub
Sub RectangleRoundedCorners41_Click()
MsgBox Cells.Find(What:="*", After:=[A1], SearchOrder:=xlByColumns, SearchDirection:=xlPrevious).Column
End Sub
Sub RectangleRoundedCorners42_Click()
Dim xTable As ListObject
    Dim xSheet As Worksheet
    Dim I As Long
    I = -1
    Sheets.Add.Name = "Table Name"
    For Each xSheet In Worksheets
        For Each xTable In xSheet.ListObjects
            I = I + 1
            Sheets("Table Name").Range("A1").Offset(I).Value = xTable.Name
        Next xTable
    Next

End Sub
Sub RectangleRoundedCorners1_Click()


End Sub
Sub Macro1()
'
' Macro1 Macro
'

'
    ActiveSheet.Range("$BM$1:$BM$15").RemoveDuplicates Columns:=1, Header:=xlNo
End Sub
Sub Sheet34_RectangleRoundedCorners1_Click()
Dim tableListObj As ListObject
    Dim TblRng As Range
    
    'Sheet Name
    With Sheets("sheet34")
            
        'Find Last Row
        
        'Find Last Column
         lCol = Cells.Find(What:="*", After:=[A1], SearchOrder:=xlByColumns, SearchDirection:=xlPrevious).Column
    b = lCol + 2
    l = lCol + 5
        
        'Range to create table
        Set TblRng = .Range(Cells(1, b), Cells(1, l))
        
        'Create table in above specified range
        Set tableListObj = .ListObjects.Add(xlSrcRange, TblRng, , xlYes)
        
        'Specifying table name
        tableListObj.Name = "FirstDynamicTable" & lCol
        
        'Specify table style
        tableListObj.TableStyle = "TableStyleMedium14"
    End With
    
    'Display message on the screen
    MsgBox "Table has created successfully.", vbInformation, "VBAF1"

End Sub
